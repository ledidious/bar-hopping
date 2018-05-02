INSERT INTO `bar-hopping`.`USER` (`yearOfBirth`, `joinedSince`, `username`, `password`, `sex`, `email`) VALUES ('1995-04-02', '2018-05-02', 'hackerman', 'dkejrkj/23jkj', 'male', 'hackingyou@gmail.com');
INSERT INTO `bar-hopping`.`USER` (`yearOfBirth`, `joinedSince`, `username`, `password`, `sex`, `email`) VALUES ('1955-03-02', '2018-05-02', 'wurstfan', 'dkejrkj/23jkj', 'male', 'currywurst@gmail.com');
INSERT INTO `bar-hopping`.`USER` (`yearOfBirth`, `joinedSince`, `username`, `password`, `sex`, `email`) VALUES ('1991-08-07', '2018-05-01', 'adafruit', 'dkejrkj/23jkj', 'female', 'ponyslaystation@gmx.com');


INSERT INTO `bar-hopping`.`TOUR` (`fk_userID`, `name`) VALUES ('3', 'Test Tour');
INSERT INTO `bar-hopping`.`TOUR` (`fk_userID`, `name`) VALUES ('1', 'Bier Power');
INSERT INTO `bar-hopping`.`TOUR` (`fk_userID`, `name`) VALUES ('3', 'Super Abend');
INSERT INTO `bar-hopping`.`TOUR` (`fk_userID`, `name`) VALUES ('1', '100% Hacke');


INSERT INTO `bar-hopping`.`MARKER` (`lat`, `lng`, `name`) VALUES ('52.522564', '7.314476', 'Steakhouse');
INSERT INTO `bar-hopping`.`MARKER` (`lat`, `lng`, `name`) VALUES ('58.521494', '1.311934', 'Bierkalle');
INSERT INTO `bar-hopping`.`MARKER` (`lat`, `lng`, `name`) VALUES ('34.508154', '23.314476', 'Edeltrunk');
INSERT INTO `bar-hopping`.`MARKER` (`lat`, `lng`, `name`) VALUES ('12.583835', '42.824689', 'Barzillus');
INSERT INTO `bar-hopping`.`MARKER` (`lat`, `lng`, `name`) VALUES ('27.523435', '78.822479', 'Barzillus');


INSERT INTO `bar-hopping`.`RATING` (`comment`, `value`, `fk_tourID`, `fk_markerID`) VALUES ('Unfassbier gut', '5', NULL, '1');
INSERT INTO `bar-hopping`.`RATING` (`comment`, `value`, `fk_tourID`, `fk_markerID`) VALUES ('Schöne Bar, aber teure Getränke', '3', NULL, '3');
INSERT INTO `bar-hopping`.`RATING` (`comment`, `value`, `fk_tourID`, `fk_markerID`) VALUES ('Da kannst du besser privat saufen', '1', '1', NULL);


INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('1', '5');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('1', '2');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('1', '3');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('2', '2');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('2', '5');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('3', '4');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('3', '3');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('3', '2');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('3', '5');
INSERT INTO `bar-hopping`.`TOUR2MARKER` (`fk_tourID`, `fk_markerID`) VALUES ('3', '1');

