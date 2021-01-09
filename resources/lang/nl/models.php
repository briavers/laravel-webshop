<?php
return [
    'user' => [
        'model_name' => 'gebruikers',
        'first_name' => 'Voornaam',
        'last_name' => 'achternaam',
        'email' => 'e-mail',
        'mobile' => 'mobiel',
        'birthday' => 'verjaardag',
        'password' => 'wachtwoord',
        'password_confirm' => 'bevestig wachtwoord',
        'verified' => 'geverifieerd',
        'not_verified' => 'niet geverifieerd',
    ],
    'product' => [
        'model_name' => 'producten',
        'name' => 'naam',
        'name_nl' => 'Nederlandse naam',
        'name_fr' => 'Franse naam',
        'name_en' => 'Engelse naam',
        'description' => 'Omschrijving',
        'description_nl' => 'Nederlandse beschrijving',
        'description_fr' => 'Franse beschrijving',
        'description_en' => 'Engelse beschrijving',
        'unit_price' => 'prijs',
        'stock' => 'voorraad',
        'size' => 'grootte',
        'size_nl' => 'Nederlandse grootte',
        'size_fr' => 'Franse maat',
        'size_en' => 'Engelse grootte',
        'color' => 'kleur',
        'color_nl' => 'Nederlandse kleur',
        'color_fr' => 'Franse kleur',
        'color_en' => 'Engelse kleur',
        'color_code' => 'kleurcode',
        'discount' => 'korting',
        'cost' => 'kosten',
        'category' => 'Categorie | Categorieën',
        'promoted' => 'gepromoveerd',
        'form' => [
            'default_info' => 'Standaardinformatie',
            'default_info_desc' => 'Dit is de basisinformatie die wordt gebruikt als standaardwaarden voor de producten.',
            'is_promoted' => 'item wordt gepromoot',
            'is_promoted_info' => 'Gepromote items worden extra weergegeven, op de startpagina en overzichtspagina\'s',
            'products_desc' => 'Dit zijn de beschikbare producten, moeten één item per kleur / maat zijn, bijvoorbeeld: één voor zwart medium, één voor zwart groot, één voor groen groot',
            'color_desc' => 'Dit is de kleur die kan worden gebruikt voor filters.',
            'price_desc' => 'Dit is onze prijs, wat klanten moeten betalen (zonder korting)',
            'cost_desc' => 'Dit is onze kostprijs (materiaal + werktijden), gebruikt om de winsten later te berekenen.',
            'discount_desc' => 'Als het product op korting is, kan we hier worden gewijzigd. Standaard is 0%',
            'add_item' => 'item type toevoegen',
            'remove_item' => 'Verwijder item',
            'pictures' => 'afbeeldingen',
            'pictures_desc' => 'Dit zijn de foto\'s, deze kunnen maximaal 2 MB elk zijn',
            'drop_to_upload' => 'Laat bestanden los om te uploaden',
            'drag_and_drop' => 'Sleep uw bestanden naar hier of',
            'upload' => 'een bestand uploaden',
            'uploaded_files' => 'Bestanden die worden geüpload',
            'no_files_selected' => 'Geen nieuwe bestanden geselecteerd',
            'files_that_have_been_set' => 'bestanden die zijn ingesteld',
        ],
        'promoted_items' => 'Onze topitems',
        'recent_items' => 'Nieuwe items',
    ],
    'cart' => [
        'model_name' => 'wagen',
        'view_index' => 'Bekijk winkelwagen',
        'quantity' => 'hoeveelheid',
        'subtotal' => 'subtotaal',
        'total' => 'totaal',
        'shipping' => 'Verzenden',
        'remove' => 'verwijder',
        'remove_one' => 'verwijder 1',
        'remove_all' => 'Verwijder alles',
        'order' => 'bestellen',
        'options' => 'opties',
        'your_order' => 'jouw bestelling',
    ],
    'address' => [
        'first_name' => 'Voornaam',
        'last_name' => 'achternaam',
        'street' => 'straat',
        'number' => 'nummer',
        'street_extra' => 'straat extra',
        'zipcode' => 'postcode',
        'city' => 'stad',
        'delivery' => 'bezorgadres',
    ],
    'order' => [
        'model_name' => 'Bestel | Orders',
        'your' => 'uw bestellingen',
        'present' => 'geschenk (zodat we weten dat het geheim moet blijven)',
        'number' => 'ordernummer',
        'date' => 'besteldatum',
        'too_late' => 'Sommige winkelmandjes gingen gewoon niet op voorraad, het spijt ons en ik hoop dat je iets anders vindt dat je leuk vindt',
        'open' => [
            'title' => 'We wachten op de bevestiging van de betaling',
            'body' => 'U kunt deze pagina sluiten of samen met ons wachten om te controleren of de betaling succesvol was. Het zou slechts enkele seconden moeten duren nadat u de betaling hebt voltooid. Bedankt om bij ons te winkelen',
        ],
        'authorized' => [
            'title' => 'Uw bestelling is gemaakt',
            'body' => 'Zodra de betaling is voltooid, wordt een e-mail verzonden met de orderbevestiging naar uw e-mail. Bedankt om bij ons te winkelen',
        ],
        'paid' => [
            'title' => 'Uw bestelling is gemaakt',
            'body' => 'Er is een e-mail verzonden met de orderbevestiging naar uw e-mail. Bedankt om bij ons te winkelen',
        ],
        'failed' => [
            'title' => 'Woops, mislukt uw betaling of is geannuleerd',
            'body' => 'Als u denkt dat dit een vergissing was, neem dan contact op met zo snel mogelijk op de volgende post :email',
        ],
        'download_invoice' => 'Download factuur',
    ],
    'category' => [
        'new' => 'Maak een nieuwe categorie',
        'new_sub' => 'Maak subcategorie',
        'new_sub_for' => 'Maak subcategorie voor',
        'slug' => 'slug',
        'name_nl' => 'Nederlandse naam',
        'name_fr' => 'Franse naam',
        'name_en' => 'Engelse naam',
        'description_nl' => 'Nederlandse beschrijving',
        'description_fr' => 'Franse beschrijving',
        'description_en' => 'Engelse beschrijving',
        'menu_description' => 'Hoe hoger het nummer hoe hoger de volgorde (en de kans) het wordt weergegeven in het menu (blank leeg als deze niet in het menu mag worden weergegeven) Max = 255',
        'menu' => 'Beschikbaar in het menu',
    ],
    'invoice' => [
        'invoice' => 'factuur',
        'number' => 'factuurnummer',
        'date' => 'factuur datum',
        'expiration' => 'vervaldatum',
        'description' => 'Omschrijving',
        'amount' => 'bedrag',
        'price' => 'prijs',
        'total' => 'totaal',
        'vat' => 'VAT',
        'terms' => 'Kleine onderneming onderworpen aan de vrijstellingsregeling van belasting. BTW niet toepasselijk. <br>
        U wordt vriendelijk verzocht om te voldoen aan bovenstaand bedrag binnen de vooropgestelde betalingstermijn.',
    ],
];
