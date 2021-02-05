# Routes

## Sprint 1

| URL | HTTP Method | Controller | Method | Title | Content | Comment |
|--|--|--|--|--|--|--|
| `/` | `GET` | `MainController` | `home` | Dans les shoe | 5 categories | - |
| `/mentions-legales/` | `GET` | `MainController` | `legalMentions` | Mentions legales | Legal Mentions | - |
| `catalogue/categorie/[i:id]` | `GET`  | `CatalogController` | `category` | Categorie | Products attached to the category |  (`[ID]`) represents the  category id |
| `catalogue/type/[i:id]` | `GET`  | `CatalogController` | `type` | Type | Products attached to the type |  (`[ID]`) represents the type id|
| `catalogue/marques/[i:id]` | `GET`  | `CatalogController` | `brand` | Marque| Products attached to the brand|  (`[ID]`) represents the brand id|
| `catalogue/produit/[i:id]` | `GET`  | `CatalogController` | `product` | Produit| Products details|  (`[ID]`) represents the product id |