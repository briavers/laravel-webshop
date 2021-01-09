# Categorie toevoegen

---

- [Algemene info](#category-general-info)
- [Hoofdcategorie toevoegen](#create-main-category)
- [subcategorie toevoegen](#create-sub-category)

<a name="category-general-info"></a>

## Algemene info

De categorieën werken op basis van een boomstructuur. Dit wil zeggen dat er één of meerdere hoofdcategorieën 
zijn met elk meerde sub-categorieën die elk op hun buurt weer sub-categorieën kunnen hebben enzovoort. 
Het is perfect mogelijk om 1 artikkel meerdere categorieën te geven, ongeacht of ze zich in dezelfde lijn bevinden of niet. 
bijvoorbeeld een slabbetje kan gerust de categorieën `textiel`, `slabbetje` en `3D` krijgen (maar de developer vraagt hier gezond verstand toe te passen 😉 )

Bijvoorbeeld

<div class="mermaid">
    graph TD
    Textiel --> Slabbetjes;
    Textiel --> Zakken;
    Zakken --> Zwemzak;
    Zakken --> Boodschappentas;
    3D --> cadeau-ideetjes;
    3D --> andere-dingen...;
</div>

Wanneer een product de categorie van Zwemzak krijgt zal hij ook verschijnen als je de categorie zakken of textiel kiest. 
Maar niet als je voor boodschappentas of slabbetjes, ... kiest.

<a name="create-main-category"></a>
## Hoofd categorie toevoegen

Enkele zaken die je nodig zult hebben.
 - Slug (dit is het deeltje dat in de url zal staan, deze is bij voorkeur in het engels en mag geen spaties of hoofdletters bevatten (wel een liggend streepje `-`) )
 - Plek in het menu (Een getal van 1-255 hoe belangrijk het is en al dan niet in het menu verschijnt en hoe "hoog" het in het menu staat. indien het niet in het menu mag laat je dit leeg)
 - Naam in het Nederlands, iets kort maar krachtig.
 - Naam in het Engels (kan gerust van google translate komen)
 - Naam in het Frans (kan gerust van google translate komen)
 - Beschrijving in het Nederlands (dit wordt op dit moment nog niet gebruikt maar is wat extra info van de categorie)
 - Beschrijving in het Engels (kan gerust van google translate komen)
 - Beschrijving in het Frans (kan gerust van google translate komen)

<figure style="width: 100%; height: 30vw; margin-top: 15px">
    <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/cr_DFApctTk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
</figure>

<a name="create-sub-category"></a>
## Subcategorie toevoegen

Dit is bijna exact hetzelfde als een hoofdcategorie, enkel de knop die je indrukt om eentje aan te maken is anders 

Enkele zaken die je nodig zult hebben.
 - Slug (dit is het deeltje dat in de url zal staan, deze is bij voorkeur in het engels en mag geen spaties of hoofdletters bevatten (wel een liggend streepje `-`) )
 - Plek in het menu (Een getal van 1-255 hoe belangrijk het is en al dan niet in het menu verschijnt en hoe "hoog" het in het menu staat. indien het niet in het menu mag laat je dit leeg)
 - Naam in het Nederlands, iets kort maar krachtig.
 - Naam in het Engels (kan gerust van google translate komen)
 - Naam in het Frans (kan gerust van google translate komen)
 - Beschrijving in het Nederlands (dit wordt op dit moment nog niet gebruikt maar is wat extra info van de categorie)
 - Beschrijving in het Engels (kan gerust van google translate komen)
 - Beschrijving in het Frans (kan gerust van google translate komen)

<figure style="width: 100%; height: 30vw; margin-top: 15px">
    <iframe width="100%" height="100%" src="https://www.youtube-nocookie.com/embed/K1ExiUqJWxw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
</figure>
