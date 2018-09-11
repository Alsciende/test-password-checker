test-password-checker
=====================

Votre objectif est de créer une API pour vérifier la validité des mots de passe.

Les mots de passe doivent répondre à plusieurs critères (taille minimale, mélange de types, etc.) et nous voulons que chaque critère soit vérifié par une classe dédiée.

1. Ecrire une interface `AppBundle\PasswordChecker\PasswordCheckerInterface` qui permette d'implémenter d'autres classes comme `AppBundle\PasswordChecker\MinSizeChecker`.
1. Ecrire une classe `AppBundle\PasswordChecker\AsciiChecker` qui implémente `AppBundle\PasswordChecker\PasswordCheckerInterface` et qui vérifie que le mot de passe ne contient que des caractères ASCII.
1. Ecrire une classe `AppBundle\PasswordChecker\AnagramChecker` qui implémente `AppBundle\PasswordChecker\PasswordCheckerInterface` et qui vérifie que le mot de passe n'est pas un anagramme de "password".
1. Modifier `AppBundle\Service\PasswordChecker` pour qu'il utilise les 2 nouvelles classes.
1. On voudrait pouvoir étendre le système à un grand nombre de checkers et pouvoir activer/désactiver des checkers par configuration. Proposer une solution.
Une solution est de configurer l'activation/désactivation des checkers dans un fichier de configuration. Puis de lire ce fichier de configuration pour récupérer les valeurs
 (activation/désactivation) des checkers.
 Par exemple on peut mettre en place un fichier config.yml qui sera importé dans app\config\config_dev.yml.
 Il permettra de définir les paramètres suivants:
 checkers:
     minSizeChecker : true
     asciiChecker : true
     anagramChecker : false
Puis on injecte le fichier de configuration dans le PasswordChecker, on se retrouve donc avec un tableau contenant les password checker.
Dans le service on verifie pour chaque password checker si il est actif en récupérant la valeur du nom grace à la clé du checker,
le nom provient de l'interface où on doit definir une fonction getName().
1. Quels composants standards de Symfony pourrait-on utiliser pour améliorer ou simplifier ce projet ? Vous pouvez utiliser ce README pour noter votre réponse.
On pourrait utiliser le composant validator de symfony.
Les password checker vont donc devenir des validator.
Il faudrait par exemple definir une entité qui contiendrait l'élément $password qui aurait l'annotation d'une contrainte.
On a besoin d’utiliser le composant Validator\Constraints pour pouvoir étendre notre classe AnagramChecker à celle de Constraint par exemple.
Puis créer une classe AnagramCheckerValidator qui va étendre de ConstraintValidator afin de définir la function validate() qui vérifie la validitédela contrainte, dans le cas où le password serait un anagramme alors un message d'erreur est retourné.
