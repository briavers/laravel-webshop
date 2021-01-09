<div
    wire:ignore
    x-data
    x-init="() => {
	var choices = new Choices($refs.categorySelect, {
		itemSelectText: '',
		removeItems: true,
	    removeItemButton: true,
	    searchResultLimit: 5,
	});
	choices.passedElement.element.addEventListener(
	  'change',
	  function(event) {
	  		values = getSelectValues($refs.categorySelect);
		    $wire.set('selectedCategories', values);
	  },
	  false,
	);
	@foreach($selectedCategories as $key => $value)
        choices.setChoiceByValue('{{$key}}');
    @endforeach

        }
	function getSelectValues(select) {
	  var result = [];
	  var options = select && select.options;
	  var opt;
	  for (var i=0, iLen=options.length; i<iLen; i++) {
	    opt = options[i];
	    if (opt.selected) {
	      result.push(opt.value || opt.text);
	    }
	  }
	  return result;
	}
	">
    <label for="category_select"
           class="block text-sm font-medium">{{__um('models.product.category', 2)}}</label>
    <select id="category_select" wire-model="selectedCategories" x-ref="categorySelect" multiple="multiple" class="bg-green-400 appearance-none border-none inline-block py-3 pl-3 pr-8 rounded leading-tight w-full">
        @if(count($categories)>0)
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        @endif
    </select>
</div>
