##Laravel 5 Mailer class wrappers

This package is intent to reduce work for repeating each mailer class every my project.
Package still on development.


Basic usage
```php
    public function SendmailController(Mailer $mailer) {
        (new MailerBuilder($this->mailer))
                    ->setView('emails.welcome')
                    ->setVariable(['user' => 'example'])
                    ->setSentTo('to@mailtrap.io')
                    ->setSubject('testing')
                    ->instantSend();
    }

```


Usage with CCable
```php
     public function SendmailController(Mailer $mailer) {
            (new MailerBuilder($this->mailer))
                        ->setView('emails.welcome')
                        ->setVariable(['user' => 'example'])
                        ->setSentTo('to@mailtrap.io')
                        ->setCcable(true)
                        ->setCc('cc@example.com')
                        ->setSubject('testing')
                        ->instantSendWithCc();
        }
```