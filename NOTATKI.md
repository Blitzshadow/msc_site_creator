# Notatki do projektu: msc_site_creator

## Opis aktualnej wtyczki
Wtyczka WordPress "Site Creator with Demo Selector" umożliwia użytkownikowi utworzenie nowej podstrony (subsite) w sieci multisite na podstawie wybranego szablonu demo. Wtyczka automatycznie zakłada konto administratora dla nowej strony i generuje hasło. Formularz posiada zabezpieczenie anty-spam w postaci prostego pytania matematycznego (captcha).

### Główne funkcje:
- Wybór szablonu demo (lista zdefiniowana w kodzie)
- Podanie sluga, tytułu strony i e-maila administratora
- Automatyczne tworzenie użytkownika i subsite (z użyciem NS Cloner)
- Prosta captcha (suma dwóch losowych cyfr)
- Komunikaty o błędach i sukcesie przez sesję PHP

## Pomysły na rozwój
- Integracja z CyberPanel API (np. automatyczne zakładanie konta hostingowego)
- Wysyłka maila powitalnego z danymi logowania
- Logowanie zdarzeń (kto, kiedy, jaki subsite utworzył)
- Zaawansowana walidacja formularza (AJAX, siła hasła)
- Możliwość wyboru motywu lub zestawu wtyczek
- Integracja z płatnościami (np. WooCommerce, Stripe)
- Panel zarządzania utworzonymi stronami
- Automatyczne usuwanie nieaktywnych subsite’ów
- Obsługa wielu języków (i18n)
- Webhooki/integracje z zewnętrznymi systemami

## Ostatnie zmiany
- Dodano prostą captcha do formularza
- Rozwiązano konflikty scalania w plikach
- Uporządkowano kod i pliki formularza

## Notatki techniczne
- Plik `form-handler.php` obsługuje walidację i logikę tworzenia subsite
- Plik `form.php` zawiera formularz z zabezpieczeniem anty-spam
- Plik `site-creator.php` odpowiada za właściwe utworzenie subsite i użytkownika
- Pliki checkpoint i .ipynb_checkpoints to kopie zapasowe, nie są używane produkcyjnie

---
Dopisz tu kolejne pomysły, decyzje i zmiany, aby zachować pełny kontekst projektu!
