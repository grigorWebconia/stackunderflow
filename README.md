Setup the database:

open your terminal and go into the folder: cd ./stackunderflow/backend/stackunderflow_backend

execute the commands as follow:
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:generate
- php bin/console doctrine:migrations:migrate

after that sould the database stackunderflow and the table user appear.
To start the backend localy you need to type in your terminal: symfony server:start
