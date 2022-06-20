# Symfony Microservices Communication App 

Used as an example for blog post series: Symfony Microservices Communication

Stack used: Symfony 6.1, PHP 8.1, RabbitMQ 3

## Setting up

```shell
git clone git@github.com:thecodest-co/microservices-in-symfony.git
cd microservices-in-symfony/
docker-compose up --build -d
```

## Testing

From APP2 we can issue command:
```shell
docker exec -it app2 php bin/console app:send
```

In APP1 you can consume those messages and turn them back into PHP objects.
```shell
docker exec -it app1 php bin/console messanger:consume -vv external_messages
```

As an output you should see Messages issued by APP2.
```shell
[warning] APP2: {STATUS_UPDATE} - Worker X assigned to Y
[info] Message App\Message\StatusUpdate handled by App\Handler\StatusUpdateHandler::__invoke
[info] App\Message\StatusUpdate was handled successfully (acknowledging to transport).
```