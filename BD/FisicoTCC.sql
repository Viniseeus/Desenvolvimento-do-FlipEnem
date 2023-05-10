
ALTER TABLE `tccflipenem`.`questao` 
ADD CONSTRAINT `idArea`
  FOREIGN KEY (`idarea`)
  REFERENCES `tccflipenem`.`area` (`idArea`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `responde`
  FOREIGN KEY (`resposta`)
  REFERENCES `tccflipenem`.`resposta` (`idresponde`)
  ; 
  select * FROM questao ORDER BY RAND() LIMIT 1;
  SELECT * FROM tccflipenem.questao AS q
INNER JOIN areaconhe AS a ON a.idArea=q.idarea
ORDER BY RAND() LIMIT 1;