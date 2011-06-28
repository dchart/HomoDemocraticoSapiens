NOT FOR PRODUCTION
==================

Initialization
--------------

* Rename ``app/config/parameters.ini.dist`` as ``app/config/parameters.ini``
* Update information inside this file according to your own parameters
* Create ``cache`` and ``logs`` directories and chown all rights without root privilege
    mkdir app/cache && mkdir app/logs
    chmod 777 app/cache app/logs
