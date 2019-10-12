https://medium.com/@ger86/c%C3%B3mo-instalar-sonataadmin-en-symfony-4-fc48053175ac

https://github.com/sonata-project/sandbox

http://www.miguelvilata.com/blog/creando-un-proyecto-base-con-symfony-y-sonata-project


### Commands

* `php bin/console doctrine:database:create`
* `php bin/console doctrine:schema:update --force`
* `bin/console sonata:easy-extends:generate SonataUserBundle --dest=src --namespace_prefix=App`


```bash
 bin/console fos:user:create --super-admin
    Please choose a username:root
    Please choose an email:root@domain.com
    Please choose a password:root
    Created user root
```


* `php bin/console make:sonata:admin App\Entity\Page`

* `bin/console doctrine:generate:entities Tutorial`