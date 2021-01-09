@servers(//THIS CONTAINS SERVER SSH INFO)

@setup
    $release = date('YmdHis');
    $repository = 'git@gitlab.com:BrianVerschoore/heksentuin-shop.git';

    $dev_releases_dir = '~/subsites/heksentuin-shop/releases';
    $dev_app_dir = '~/subsites/heksentuin-shop';
    $dev_new_release_dir = $dev_releases_dir .'/'. $release;

    $prod_releases_dir = '~/subsites/deheksentuin/releases';
    $prod_app_dir = '~/subsites/deheksentuin';
    $prod_new_release_dir = $prod_releases_dir .'/'. $release;
@endsetup

@story('deploy-dev', ['on' => ['dev']])
    dev_clone_repository
    dev_run_composer
    dev_set_env
    dev_migrate
    dev_update_symlinks
    dev_others
@endstory

@task('dev_clone_repository', ['on' => ['dev']])
    echo 'Cloning repository'
    [ -d {{ $dev_releases_dir }} ] || mkdir {{ $dev_releases_dir }}
    git clone --depth 1 -b develop {{ $repository }} {{ $dev_new_release_dir }}
    cd {{ $dev_new_release_dir }}
    git reset --hard {{ $commit }}
@endtask

@task('dev_run_composer', ['on' => ['dev']])
    echo "Starting deployment ({{ $release }})"
    cd {{ $dev_new_release_dir }}
    composer install --prefer-dist --no-scripts -q -o
@endtask

@task('dev_run_npm', ['on' => ['dev']])
    echo "Starting npm"
    cd {{ $dev_new_release_dir }}
    npm install --silent --no-progress
    npm run prod --silent --no-progress
@endtask

@task('dev_update_symlinks', ['on' => ['dev']])
    echo "Linking storage directory"
    rsync {{ $dev_new_release_dir }}/storage/app/public/keep  {{ $dev_app_dir }}/storage/app/public/keep
    rm -rf {{ $dev_new_release_dir }}/storage
    ln -nfs {{ $dev_app_dir }}/storage {{ $dev_new_release_dir }}/storage

    echo 'Linking current release'
    ln -nfs {{ $dev_new_release_dir }} {{ $dev_app_dir }}/current

    echo 'removing old releases'
    find {{$dev_releases_dir}} -mindepth 1 -maxdepth 1 -type d -not -name {{ $release }} -exec rm -rf '{}' \;

    cd {{ $dev_new_release_dir }}
    php artisan storage:link
@endtask

@task('dev_set_env', ['on' => ['dev']])
    echo "Setting ENV"
    cp {{ $dev_app_dir }}/.env.master {{ $dev_new_release_dir }}/.env
@endtask

@task('dev_migrate', ['on' => ['dev']])
    echo "migrating"
    cd {{ $dev_new_release_dir }}
    php artisan migrate --force
@endtask

@task('dev_others', ['on' => ['dev']])
    echo "others"
    cd {{ $dev_new_release_dir }}
    php artisan optimize
@endtask

@story('deploy-prod')
    prod_clone_repository
    prod_run_composer
    prod_set_env
    prod_migrate
    prod_update_symlinks
    prod_others
@endstory

@task('prod_clone_repository', ['on' => ['prod']])
echo 'Cloning repository'
[ -d {{ $prod_releases_dir }} ] || mkdir {{ $prod_releases_dir }}
git clone --depth 1 -b master {{ $repository }} {{ $prod_new_release_dir }}
cd {{ $prod_new_release_dir }}
git reset --hard {{ $commit }}
@endtask

@task('prod_run_composer', ['on' => ['prod']])
echo "Starting deployment ({{ $release }})"
cd {{ $prod_new_release_dir }}
composer install --prefer-dist --no-scripts -q -o
@endtask

@task('prod_run_npm', ['on' => ['prod']])
echo "Starting npm"
cd {{ $prod_new_release_dir }}
npm install --silent --no-progress
npm run prod --silent --no-progress
@endtask

@task('prod_update_symlinks', ['on' => ['prod']])
echo "Linking storage directory"
rsync {{ $prod_new_release_dir }}/storage/app/public/keep  {{ $prod_app_dir }}/storage/app/public/keep
rm -rf {{ $prod_new_release_dir }}/storage
ln -nfs {{ $prod_app_dir }}/storage {{ $prod_new_release_dir }}/storage

echo 'Linking current release'
ln -nfs {{ $prod_new_release_dir }} {{ $prod_app_dir }}/current

echo 'removing old releases'
find {{$prod_releases_dir}} -mindepth 1 -maxdepth 1 -type d -not -name {{ $release }} -exec rm -rf '{}' \;

cd {{ $prod_new_release_dir }}
php artisan storage:link
@endtask

@task('prod_set_env', ['on' => ['prod']])
echo "Setting ENV"
cp {{ $prod_app_dir }}/.env.master {{ $prod_new_release_dir }}/.env
@endtask

@task('prod_migrate', ['on' => ['prod']])
echo "migrating"
cd {{ $prod_new_release_dir }}
php artisan migrate --force
@endtask

@task('prod_others', ['on' => ['prod']])
echo "others"
cd {{ $prod_new_release_dir }}
php artisan optimize
@endtask
