# NoSQL

outil NoSQL permettant d’analyser des données et de les présenter sur un site web.

Le but est d'extraire les données de la base de données actuelles qui
est une base MySql traditionnelle.

Les éléments sont extraits dans un fichier Excel qui sera analysé et enrichi de
données élémentaires comme le code postal et les coordonnées GPS de l’adresse
des clients.

Chaque coordonnée GPS donnera lieu à la création d’un élément dans la base de
données pour la codification d’une puce RFID portant le code barre du client ainsi
que ses coordonnées GPS.

A partir du fichier extrait (Excel) il faut injecter les données dans Mongodb.
Prévoir un programme permettant à l’aide d’une page web de pouvoir compléter
dans la base : le code postal, le bureau distributeur et les coordonnées
géographiques du client.

A la fin des différentes transactions on devra afficher un compteur donnant le
nombre global d’éléments dans la base ainsi que le chiffre de ceux qui restent à
compléter.

On pourra mettre un bouton sur la page web qui nous donnera un affichage du
nombre de clients qui n’ont pas les 3 zones renseignées.

Les données doivent être réparties en se servant des propriétés de MongoDB :
Base, Collections.

Objectif : réaliser l’application et fournir un dossier contenant la méthode
appliquée, l’architecture de la base MongoDB, l’architecture technique complète.
Une démonstration de l’application sera à effectuer.
