# Second Chance – Second-hand e-shop

Second Chance je webová aplikácia elektronického obchodu zameraná na predaj second-hand oblečenia. Projekt bol vytvorený v rámci predmetu **Základy webových technológií** na Fakulte informatiky a informačných technológií STU v Bratislave.

## Autori

- Kristína Sollárová
- David Lencsés

## Predmet

Základy webových technológií (WTECH)  
FIIT STU Bratislava

---

## Funkcionalita

###  Klientska časť

- prehliadanie produktov podľa kategórií
- detail produktu s galériou obrázkov
- fulltextové vyhľadávanie
- filtrovanie podľa:
  - veľkosti
  - farby
  - ceny
- radenie produktov:
  - od najlacnejších
  - od najdrahších
  - náhodné poradie
- stránkovanie produktov (12 produktov na stránku)
- registrácia, prihlásenie a odhlásenie používateľa
- nákupný košík
- zadanie dodacích údajov
- výber dopravy a platby
- potvrdenie objednávky
- nákup aj bez registrácie

###  Košík

- funguje pre prihlásených aj neprihlásených používateľov
- neprihlásený používateľ má košík uložený v PHP session
- prihlásený používateľ má košík uložený v databáze
- po prihlásení sa session košík automaticky prenesie do databázy
- v košíku sa automaticky nachádza merch produkt - **Second Chance plátenka**
- množstvo je možné meniť iba pri merch produkte 

###  Administrátorská časť

- správa produktov
- pridanie produktu vrátane nahrávania obrázkov
- úprava produktu
- vymazanie produktu
- filtrovanie produktov v admin paneli

---

##  Použité technológie

- PHP 8
- Laravel 12
- MySQL
- Blade Templates
- Bootstrap
- CSS
- JavaScript
- Vite
- Visual Studio Code
- GitHub

---

##  Databázový model

Projekt obsahuje 10 hlavných tabuliek:

- users
- adresy
- kategorie
- produkty
- obrazky
- kosiky
- polozky_kosika
- objednavky
- polozky_objednavky
- platby 

---

##  Implementované funkcionality

### Stránkovanie
Produkty sú rozdelené na stránky po 12 položkách pomocou Laravel `Paginator`.

### Filtrovanie a radenie
Produkty je možné filtrovať podľa veľkosti, farby, ceny, kategórie a pohlavia. Výsledky je možné radiť podľa ceny alebo náhodne.

### Vyhľadávanie
Fulltextové vyhľadávanie v poliach:

- názov
- značka
- popis
- farba

### Košík
Kompletná správa košíka vrátane pridávania, odoberania, odstránenia a zmeny množstva merch produktu.

---

##  Responzívny dizajn

Aplikácia je responzívna vďaka kombinácii:

- Bootstrap grid systému
- vlastných CSS media queries 

---

##  Obrázky a grafika

- logo vytvorené v Canva
- bannery a produktové obrázky generované pomocou AI
- ikony sociálnych sietí, používateľa a košíka generované pomocou ChatGPT a Gemini 