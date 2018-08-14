# Picsupport
## Installation
To install create a custom ``.env`` file and a database. Then run the following command:

~~~sh
chmod 755 -R picsupport.gpii.eu/ &&\
chmod -R o+w picsupport.gpii.eu/storage &&\
chmod -R o+w picsupport.gpii.eu/bootstrap/cache/
composer install --ignore-platform-reqs
~~~
