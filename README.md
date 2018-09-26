# helpdeskprj

1. Instalar git, vagrant, composer, npm, virtualbox
2. `vagrant plugin install vagrant-bindfs`
3. `vagrant plugin install vagrant-hostsupdater`
4. `vagrant plugin install vagrant-winnfsd` (caso use windows)
5. `cd laravelAPIHelpDeskPRJ`
6. `composer install`
7. `php vendor/bin/homestead make`
8. Editar o Homestead.yaml conforme as configuracoes abaixo:
9. Alterar o parametro memory para 512
10. Dentro do parametro folders, adicione `type: "nfs"` apos a ultima linha. Sem NFS o acesso ficara extremamente lento.
11. Dentro do parametro sites, adicione `type: "laravel"` apos a ultima linha.
12. Dentro do parametro sites, adicione `schedule: true` apos a ultima linha.
13. `cp .env.example .env`
14. Editar o arquivo .env conforme as configuracoes abaixo:
15. DB_CONNECTION=pgsql
16. DB_PORT=5432
17. BROADCAST_DRIVER=redis
18. CACHE_DRIVER=redis
19. SESSION_DRIVER=redis
20. QUEUE_DRIVER=redis
