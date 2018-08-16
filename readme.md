# Picsupport
## Installation
To install create a custom ``.env`` file and a database. Then run the following command:

~~~sh
chmod 755 -R picsupport.gpii.eu/ &&\
chmod -R o+w picsupport.gpii.eu/storage &&\
chmod -R o+w picsupport.gpii.eu/bootstrap/cache/
composer install --ignore-platform-reqs
~~~

## Copyright & Licence

Copyright 2015-2018 [AlexVonB]()https://github.com/AlexVonB and Hochschule der Medien (HdM) / Stuttgart Media University ([research group Remex](https://www.hdm-stuttgart.de/remex)).

The code of picsupport is available under the terms of the [Apache 2.0 License](https://github.com/REMEXLabs/picsupport/blob/master/LICENSE).
