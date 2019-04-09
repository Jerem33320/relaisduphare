# Relais du phare _(document en cours d'écriture)_

1. Le projet sera développé en mode **procédural** dans un premier temps.
2. Puis nous allons créer nos premières _classes_ pour une initiation à la **programmation orientée objet**
3. Pour finir, nous mettrons en place _composer_, un logiciel qui facilitera le chargement des classes, qu'elles viennent de notre code source, ou de modules externes.

## Structure du projet

### Structure en mode procédural

### Structure en mode objet

## Le ficher `.env`

C'est un simple fichier texte dans lequel on va stocker les informations qui ne
doivent pas être versionnées :

- les données sensibles (mots de passe, clés d'APIs, ...)
- les données propres à l'environnement (Url "locale", proxy, nom de la base de données, ...)

De cette manière, il sera très simple de changer la base de donnéess par exemple.
On peut avoir `relais-du-phare-dev` pour développer, et `relais-du-phare` pour la **production**,
il suffit de changer cela dans le fichier `.env`

Plus d'informations :[ici](https://www.12factor.net/)
