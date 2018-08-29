
INSERT INTO `user` (`Email`, `Password`, `FirstName`, `MiddleName`, `LastName`, `Country`, `City`, 
`Phone`, `Birthday`, `ImagePhoto`, `StatusUser`, `WalletAddress`, `UserType`) 
VALUES ('customer@gmail.com', '123456', 'customer', 'gmail', 'com', 'peru', 'trujillo', '123456', 
now(), '', 2, '', 'C');

INSERT INTO `user` (`Email`, `Password`, `FirstName`, `MiddleName`, `LastName`, `Country`, `City`, 
`Phone`, `Birthday`, `ImagePhoto`, `StatusUser`, `WalletAddress`, `UserType` ) 
VALUES ('owner@gmail.com', '123456', 'owner', 'gmail', 'com', 'peru', 'trujillo', '123456', 
now(), '', 2, '', 'O');

INSERT INTO `restaurant` (`Country`, `City`, `Address`, `RestaurantName`, 
`Longitude`, `Latitude`, `QrCode`, `qtycoins`, `IdUser`, `Type`) 
VALUES ('Peru', 'Trujillo', 'Av. America 1412', 'La Mesita', '-8.133395 ', '-79.0367832', 
'', '150', '3', 'restaurant');

INSERT INTO `offer` (`IdOffer`, `Description`, `OfferedCoins`, `DateFrom`, `DateTo`, `IdRestaurant`, 
`MaxOffers`, `AppliedOffers`, `MaxCoins`) VALUES (NULL, 
'We offer 2 coins for the first 50 people who come to our premises.', '2', NOW(), NULL, '1', '50', '0', NULL);