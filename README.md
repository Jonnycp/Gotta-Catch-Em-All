<section align="center">
<h1>Gotta-Check-Them-All</h1>
<div>
    <img src="https://img.shields.io/badge/Stato-Completato-success?style=for-the-badge" alt="Project Status">
    <img src="https://img.shields.io/badge/FrontEnd-Html-red?style=for-the-badge" alt="Project language">
    <img src="https://img.shields.io/badge/BackEnd-PHP-blue?style=for-the-badge" alt="Project language">
    <img src="https://img.shields.io/badge/Collaboratori-3-yellow?style=for-the-badge" alt="Project Status">
</div>
</section>

## Indice
* [Che cos'è?](#che-cos%C3%A8)
* [Inputs](#linput)
* [Dataset](#dataset)
* [Design](#design)
* [Backend](#backend)
* [Front-end](#front-end)
* [About](#about)
* [Project Managing](#project-managing)
* [Disclamer](#disclamer)

## Che cos'è?
- Gotta Check Them All è un innovativo **motore di ricerca di Pokèmon**. 
- Cerca i K Pokèmon più simili ad un input di ricerca.

## L'input
In input l'utente dovrà fornire una serie di caratteristiche (numeri da 0 a 300) che denotano un Pokèmon. Sono esattamente:
- punti vita (hp)
- punti attacco (attack)
- punti difesa (defense)
- punti attacco speciale (sp. atk)
- punti difesa speciale (sp. defense)
- punti velocità
<img src="https://cdn.discordapp.com/attachments/814108226340913152/1065253388578725898/image.png" alt="Spiegazione algoritmo" align="center" width="50%"/>

## Dataset
Il dataset utilizzato è un `csv` contentuto in <code>/data/pokemons.csv</code><br>
Le immagini dei Pokèmon, invece, sono contenute in `static/img/` in formato `png` e nominate per id del Pokèmon corrispondete nel dataset.

## Design
Il design realizzato in html, css e js è il seguente:
<img src="https://cdn.discordapp.com/attachments/814108226340913152/1065254364597465310/design.png" alt="Design"/>

## Backend
Il backend è realizzato in PHP-plain. Sono state create delle API Rest in modo che il front-end può connettersi in modo asincrono.<br>
L'endpoint è `/api/pokemon?hp=300&atk=0&hp=10` ... <br>
È possibile passare come parametro tutti gli input elencati precedentemente. Sono necessari almeno 2 input. <br>
Si è prestata attenzione alla sicurezza e a tutti i possibili casi che possono accadere.<br>
Per realizzare la funzione di ricerca si è usata la seguente formula matematica della distanza euclidea:
<img src="https://cdn.discordapp.com/attachments/814108226340913152/1065255732175437924/image.png" alt="formula"/>

## Front-end
Gli input e le card sono generati dinamicamente attraverso script javascript creati appositamente per l'occasione.

## About
Il progetto è stato realizzato da:
- Jonathan Caputo (Project Manager)
- Dalila Albanese (Backend Developer)
- Antonio Carmosino (Frontend Developer)
- Giuseppe Priore (Junior Frontend Developer)

## Project Managing
Si è utilizzato click-up per gestire le varie task assegnate ai developer. Per ogni task si è tracciato il tempo usato per la realizzazione ed assegnato un costo.
Il costo totale di questo progetto può essere comunicato solo previa comunicazione a <a href="mailto: jonathan-caputo@hotmail.com"/>

## Disclamer
Questo è un progetto scolastico, realizzato tra ottobre e novembre 2022.
