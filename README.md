## CORMAN ##



### Requisiti ###
Installazione testata su Windows 7 (x64) e Windows 10 (x64).
* S.O. Windows (x86/x64)
* [Composer](https://getcomposer.org/) ultima versione
* [XAMPP](https://www.apachefriends.org/it/index.html) con:
  * PHP >= 7.0.0
  * OpenSSL PHP Extension
  * PDO PHP Extension
  * Tokenizer PHP Extension
  * XML PHP Extension
* [Git](https://git-scm.com/)


### Installazione ###

Nota: Seguire l'ordine delle istruzioni di questo file.

Creare il database mysql di nome CORMAN

Aprire il prompt dei comandi e:
* portarsi nella cartella root dove verrà copiato il progetto (ex.: `cd C:\xampp\htdocs`)
* digitare `git clone https://github.com/cdesolda/corman.git corman` per clonare il progetto nella cartella "corman"
* digitare `cd corman`
* digitare `composer install`
* digitare `composer update`
* digitare il comando: php artisan key:generate
* digitare il comando: php artisan migrate:fresh
* Installare il dump del database (/database/DB dump.sql) (rimuovere l'abilitazione del check su foreign key)
* per settare le impostazioni globali in *.env file :
   * impostare la DB_CONNECTION con il tipo di connessione al db (mysql) (già impostato)
   * impostare il DB_DATABASE con il nome dello schema da utilizzare (CORMAN)  (già impostato)
   * impostare la DB_USERNAME con un eventuale nome utente per il db (root è impostata di default)
   * impostare la DB_PASSWORD con una eventuale password per l'utente del db
   * (opzionale) impostare APP_URL con la URL per aprire l'applicazione dal browser (ex.: `http://localhost/corman` oppure con l'indirizzo impostato nel virtual host di Apache) o lasciare così com'è ed aprire su http://localhost:8000;

Per avviare la piattaforma:   
* digitare `php artisan serve` 

Per avviare i test:
* avviare prima la piattaforma con il comando `php artisan serve` se non è stato fatto, aprire un'altro cmd, posizionarsi sempre nella root del progetto e digitare `php artisan dusk`  (avvia tutti i test presenti in Tests/Browser). Per avviare un singolo test `php artisan dusk --group=tag` sostituendo tag con il nome del tag (senza @ e case sensitive) assegnato al test locato nel codice (nei commenti iniziali), di default il tag è uguale al nome del test. Esempio: `php artisan dusk --group=RegistrationTest`

-------------------------------------------------------------------------------------------------------------

### Configurazione virtual host (passaggi opzionali) ###
Tutorial su come impostare un virtual host.

**Requisiti:**
* S.O. Windows (x86/x64) qualsiasi versione (avere permessi di amministratore)
* XAMPP qualsiasi versione

**Configurazione del virtual host "laravel.corman.dev" su XAMPP:**
* andare nella cartella `C:\xampp\apache\conf\extra`
* aprire il file `httpd-vhosts.conf` con un editor di testo qualsiasi
* aggiungere le seguenti righe a quelle esistenti:

```html
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/corman/public"
    ServerName laravel.corman.dev
    ServerAlias www.laravel.corman.dev
</VirtualHost>
```
* salvare il file

**Configurazione hosts di Windows:**
* aprire un qualsiasi editor di testo (blocco note) in **modalità amministratore**
* dal programma aprire il file `C:\Windows\System32\drivers\etc\hosts` (se non compare nella cartella scegliere come tipo di file **"Tutti i file"**
* aggiungere una nuova riga con: `127.0.0.1	laravel.corman.dev`
* salvare il file

**Testare il virtual host**
* ravviare il server Apache dal pannello di XAMPP
* aprire un browser
* digitare nella barra degli indirizzi `laravel.corman.dev`
Se tutto è andato per il meglio comparirà la pagina iniziale di **corman**
