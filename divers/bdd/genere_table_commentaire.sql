DROP TABLE IF EXISTS `EasyCooking`.`commentaire` ;

CREATE TABLE IF NOT EXISTS `EasyCooking`.`commentaire` (
  `id` INT(50) NOT NULL AUTO_INCREMENT,
  `commentaire` TEXT NULL,
  `date` DATETIME NULL,
  `fk_utilisateur_id` INT(50) NOT NULL,
  `fk_recette_id` INT(50) NOT NULL,
  INDEX `fk_utilisateur_has_recette_recette1_idx` (`fk_recette_id` ASC),
  INDEX `fk_utilisateur_has_recette_utilisateur_idx` (`fk_utilisateur_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_utilisateur_has_recette_utilisateur`
    FOREIGN KEY (`fk_utilisateur_id`)
    REFERENCES `EasyCooking`.`utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_utilisateur_has_recette_recette1`
    FOREIGN KEY (`fk_recette_id`)
    REFERENCES `EasyCooking`.`recette` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;