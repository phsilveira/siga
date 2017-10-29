# SIGA

SIGA - Sistema integrado de gerenciamento de ativos

## Getting Started

Esse sistema foi escrito em php usando o framework [Codeignitor-3](https://codeigniter.com/), respeitando os princípios de MVC, com banco de dados MySql e conteinerizado em Docker para facilitar gerenciamento de ambiente e deploy. Vale ressaltar que é uma PoC e está incompleto, muito precisa ser feito.

As funcões de hoje são os CRUDs de `Chamados`, `Ativos`, `Usuários`, `Items` e `Locais` todas as regras de negócios referente à aplicação estão nos controllers.

Referente à regra de negócios de Chamados (`application/controllers/Assigments.php`) segue o seguinte fluxo básico:

```
add > accept > register > register_asset > register > locations > complete
```

Para cada metódo é enviado com a função `send_push` feito em [Firebase](https://firebase.google.com/) para enviar para os mobiles que tenha o App instalado automaticamente


### Prerequisitos

Para rodar é necessário ter instalado o [docker](https://docs.docker.com/engine/installation/) e [docker-compose](https://docs.docker.com/compose/install/#uninstallation)

### Instalando

Tendo os pré requisitos instalados só precisa inicializar os containers

```
git clone https://github.com/phsilveira/siga.git
cd ./siga
docker-compose up -d # subir serviços
docker-compose exec database mysql -uroot -psecret --databases siga > dump.sql # restore db
```

Abra o navegador e insira

```
http://0.0.0.0/
```

Administrador
- Usuário: test
- Senha: test

Operador
- Usuário: victor
- Senha: 123456


## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Autores

* **Paulo Henrique** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)