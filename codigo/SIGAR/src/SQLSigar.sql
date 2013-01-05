CREATE  TABLE IF NOT EXISTS `mydb`.`Pessoa` (
  `idPessoa` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `telefoneResidencial` VARCHAR(45) NULL ,
  `telefoneCelular` VARCHAR(45) NULL ,
  `sexo` VARCHAR(45) NULL ,
  `dataNascimento` DATE NULL ,
  `tipo` VARCHAR(45) NULL ,
  `cpf` VARCHAR(45) NULL ,
  PRIMARY KEY (`idPessoa`) ,
  UNIQUE INDEX `idusuario_UNIQUE` (`idPessoa` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NULL ,
  `senha` VARCHAR(45) NULL ,
  `idPessoa` INT UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`idUsuario`) ,
  INDEX `fk_Usuario_Pessoa1_idx` (`idPessoa` ASC) ,
  CONSTRAINT `fk_Usuario_Pessoa1`
    FOREIGN KEY (`idPessoa` )
    REFERENCES `mydb`.`Pessoa` (`idPessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Secretaria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Secretaria` (
  `idSecretaria` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `carteiraTrabalho` VARCHAR(45) NULL ,
  `idUsuario` INT ZEROFILL UNSIGNED NOT NULL ,
  PRIMARY KEY (`idSecretaria`) ,
  INDEX `fk_Secretaria_Usuario1_idx` (`idUsuario` ASC) ,
  UNIQUE INDEX `idUsuario_UNIQUE` (`idUsuario` ASC) ,
  UNIQUE INDEX `idSecretaria_UNIQUE` (`idSecretaria` ASC) ,
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Professor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Professor` (
  `idProfessor` INT NOT NULL AUTO_INCREMENT ,
  `meioTransporte` VARCHAR(45) NULL ,
  `idUsuario` INT NOT NULL ,
  PRIMARY KEY (`idProfessor`) ,
  INDEX `fk_Professor_Usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `idUsuario`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Responsavel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Responsavel` (
  `idResponsavel` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `categoria` VARCHAR(45) NULL ,
  `telefoneTrabalho` VARCHAR(45) NULL ,
  `idPessoa` INT UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`idResponsavel`) ,
  INDEX `fk_Responsavel_Pessoa1_idx` (`idPessoa` ASC) ,
  CONSTRAINT `fk_Responsavel_Pessoa1`
    FOREIGN KEY (`idPessoa` )
    REFERENCES `mydb`.`Pessoa` (`idPessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Aluno`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Aluno` (
  `idAluno` INT NOT NULL AUTO_INCREMENT ,
  `anoEscolar` VARCHAR(45) NULL ,
  `escola` VARCHAR(45) NULL ,
  `idResponsavel` INT UNSIGNED ZEROFILL NOT NULL ,
  `idUsuario` INT NOT NULL ,
  PRIMARY KEY (`idAluno`) ,
  INDEX `fk_Aluno_Responsavel1_idx` (`idResponsavel` ASC) ,
  INDEX `fk_Aluno_Usuario1_idx` (`idUsuario` ASC) ,
  CONSTRAINT `fk_Aluno_Responsavel1`
    FOREIGN KEY (`idResponsavel` )
    REFERENCES `mydb`.`Responsavel` (`idResponsavel` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aluno_Usuario1`
    FOREIGN KEY (`idUsuario` )
    REFERENCES `mydb`.`Usuario` (`idUsuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Aula`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Aula` (
  `idaula` INT ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT ,
  `idAluno` INT UNSIGNED ZEROFILL NOT NULL ,
  `data` DATE NULL ,
  `horaInicio` TIME NULL ,
  `duracao` TIME NULL ,
  `conteudo` VARCHAR(300) NULL ,
  PRIMARY KEY (`idaula`) ,
  UNIQUE INDEX `idaula_UNIQUE` (`idaula` ASC) ,
  INDEX `fk_aula_Aluno1_idx` (`idAluno` ASC) ,
  UNIQUE INDEX `idAluno_UNIQUE` (`idAluno` ASC) ,
  CONSTRAINT `fk_aula_Aluno1`
    FOREIGN KEY (`idAluno` )
    REFERENCES `mydb`.`Aluno` (`idAluno` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Endereco`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Endereco` (
  `idendereco` INT NOT NULL ,
  `idPessoa` INT UNSIGNED ZEROFILL NOT NULL ,
  `cep` VARCHAR(45) NULL ,
  `logradouro` VARCHAR(45) NULL ,
  `numero` INT NULL ,
  `complemento` VARCHAR(45) NULL ,
  `bairro` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `referencia` VARCHAR(200) NULL ,
  `uf` VARCHAR(45) NULL ,
  PRIMARY KEY (`idendereco`) ,
  INDEX `fk_endereco_Pessoa1_idx` (`idPessoa` ASC) ,
  CONSTRAINT `fk_endereco_Pessoa1`
    FOREIGN KEY (`idPessoa` )
    REFERENCES `mydb`.`Pessoa` (`idPessoa` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Agenda`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Agenda` (
  `idAgenda` INT ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT ,
  `idusuario` INT UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`idAgenda`) ,
  UNIQUE INDEX `idagenda_UNIQUE` (`idAgenda` ASC) ,
  UNIQUE INDEX `idusuario_UNIQUE` (`idusuario` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Disponibilidade`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Disponibilidade` (
  `idDisponibilidade` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `idProfessor` INT NOT NULL ,
  PRIMARY KEY (`idDisponibilidade`) ,
  UNIQUE INDEX `iddisponibilidade_UNIQUE` (`idDisponibilidade` ASC) ,
  INDEX `fk_Disponibilidade_Professor1_idx` (`idProfessor` ASC) ,
  CONSTRAINT `fk_Disponibilidade_Professor1`
    FOREIGN KEY (`idProfessor` )
    REFERENCES `mydb`.`Professor` (`idProfessor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`horario_disponivel`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`horario_disponivel` (
  `idhorario_disponivel` INT ZEROFILL UNSIGNED NOT NULL AUTO_INCREMENT ,
  `idDisponibilidade` INT UNSIGNED ZEROFILL NOT NULL ,
  `dia` VARCHAR(45) NULL ,
  `horaInicio` VARCHAR(45) NULL ,
  `horaFim` VARCHAR(45) NULL ,
  PRIMARY KEY (`idhorario_disponivel`) ,
  UNIQUE INDEX `iddisponibilidade_UNIQUE` (`idDisponibilidade` ASC) ,
  UNIQUE INDEX `idhorario_disponivel_UNIQUE` (`idhorario_disponivel` ASC) ,
  CONSTRAINT `fk_horario_disponivel_disponibilidade1`
    FOREIGN KEY (`idDisponibilidade` )
    REFERENCES `mydb`.`Disponibilidade` (`idDisponibilidade` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Relatorio`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Relatorio` (
  `idrelatorio` INT UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `idAluno` INT UNSIGNED ZEROFILL NOT NULL ,
  `idProfessor` INT UNSIGNED ZEROFILL NOT NULL ,
  `dataInicio` DATE NULL ,
  `dataFim` DATE NULL ,
  `descricao` VARCHAR(1000) NULL ,
  `rendimentoAluno` VARCHAR(45) NULL ,
  `rendimentoProfessor` VARCHAR(45) NULL ,
  `observacoes` VARCHAR(200) NULL ,
  PRIMARY KEY (`idrelatorio`) ,
  UNIQUE INDEX `idrelatorio_UNIQUE` (`idrelatorio` ASC) ,
  INDEX `fk_relatorio_Aluno1_idx` (`idAluno` ASC) ,
  INDEX `fk_relatorio_Professor1_idx` (`idProfessor` ASC) ,
  UNIQUE INDEX `Aluno_idAluno_UNIQUE` (`idAluno` ASC) ,
  UNIQUE INDEX `Professor_idProfessor_UNIQUE` (`idProfessor` ASC) ,
  CONSTRAINT `fk_relatorio_Aluno1`
    FOREIGN KEY (`idAluno` )
    REFERENCES `mydb`.`Aluno` (`idAluno` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_relatorio_Professor1`
    FOREIGN KEY (`idProfessor` )
    REFERENCES `mydb`.`Professor` (`idProfessor` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
