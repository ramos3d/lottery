# lottery

## Sistema

``` bash
|-- Application
    |-- app
        |-- ArtificialBrain.php
        |-- Lottery.php
    |-- index.php
    |-- assets
        |-- js
        |-- css
   
```
    
# Classe: ArtificialBrain
## Métodos

## addicted()
Algoritmo baseado em intervalos entre jogos que um número torna a aparecer e quando ele não pode aparecer. Intervalos de 5 rounds

## predictive()
Baseado na Aprendizagem supervisionada - Estratégia de Machine Learning baseada em treinamento do algoritmo a partir de um volume grande de resultados (apostas premiadas anteriores) a fim de que ele identifique padrões e tente prever a próxima "mais provável" sequência correta.

## prefixed()
É um algoritmo aleatório que fixa apenas os números passados por parâmetros.

## aleatory()
Desconsidera quaisquer resultados anteriores e gera novo array.

## byExclusion()
Algoritmo Aleatório que exclui do round de montagem até 10 números que forem passados por parâmetros.

## getFullResults()
Acessa via API todos os resultados dos jogos anteriores e salva local em Json para acelerar os testes.

Orange Data Minking,  K-Mean
