create database progetto;

create table clienti (nome varchar(255), cognome varchar(255), codice_fiscale varchar(255), username varchar(255), password varchar(255));



//blob viene usato per caricare le immagini a 64 KB
create table prodotti (id_prodotto integer, immagine blob, nome_prodotto varchar (255), descrizione varchar(255), prezzo float);

insert into prodotti values (0, "https://images-na.ssl-images-amazon.com/images/I/61SYiPiPUML._AC_SL1200_.jpg", "Mortadella", "In Sicilia the people says , a muttadella costa picca e sapi bella","15.00");
insert into prodotti  values (1, "https://lafattoria1946.com/store/wp-content/uploads/2016/01/PROSCIUTTO-SAN-DANIELE-OFFERTA.jpg", "San Daniele", "Il santo più venerato in Italia","20.00");
insert into prodotti values (2, "https://www.panoramachef.it/wp-content/uploads/2018/03/panoramachelacarneKobe-4.jpeg", "Manzo Wagyu", "Solo la migliore qualità per i nostri clienti","1300.00");
insert into prodotti values (3, "https://www.informacibo.it/wp-content/uploads/2018/10/Tonno-rosso.jpg", "Tonno Rosso", "Per coloro che non nascono quadrati","16.00");
insert into prodotti values (4, "https://images-na.ssl-images-amazon.com/images/I/41l%2BzPj2eWL._AC_.jpg", "Cialde di cannoli", "I migliori cannoli Siciliani del web, 100pcs","100.00");
insert into prodotti values (5, "https://ilcontadino-online.com/2255-large_default/insalata-lattuga-iceberg-1-testa.jpg", "Lattuga Iceberg", "La lattuga che affonda il tuo senso di fame","2.00");


create table carrello (id_vendita integer primary key auto_increment, id_prodotto integer, immagine blob, nome_prodotto varchar(255), ordinato_da varchar(255), prezzo float);

create table riepilogo (utente varchar(255), prezzo_totale float);

---Trigger aggiorna prezzo---
delimiter //
drop trigger if exists prezzototale;
create trigger prezzototale
after insert on carrello
for each row
if exists (select * from carrello)
then
update riepilogo 
set prezzo_totale= (select sum(prezzo) from carrello);
end if; 
end //
delimiter ; 