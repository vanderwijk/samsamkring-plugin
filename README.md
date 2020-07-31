# samsamkring-plugin

Gewenste inkomen slider (sliderwaarde tussen 1000 en 4000 = netto inkomen wat je kunt afspreken):

Maandelijkse inleg (excl. Bankkosten) = 0,045 * [sliderwaarde] + 15

Historische maandelijkse kosten (excl. Bankkosten) = 15 + [schenkvariabele] * [sliderwaarde]

Historisch maandelijks gespaard = [maandelijkse inleg] – [historische maandelijkse kosten]

Benodigde inkomen uit onderneming:

Eenmanszaak: [Minimaal noodzakelijke bruto inkomen] = -0,000000000037936*[Sliderwaarde]^4 + 0,00000026359*[Sliderwaarde]^3 - 0,00021489*[Sliderwaarde]^2 + 0,79034*[Sliderwaarde] + 517,5

BV: [Minimaal noodzakelijke bruto inkomen] =0,000000000043457*[Sliderwaarde]^4 - 0,00000051491*[Sliderwaarde]^3 + 0,0022299*[Sliderwaarde]^2 - 1,478*[Sliderwaarde] + 1132,76

 

Maximale gewenste inkomen (sliderwaarde tussen 1000 en 9050 = gemiddelde bruto inkomen uit de onderneming):

Eenmanszaak:

[Maximaal mogelijke netto inkomen EZ] =-0,0000000000016214*[Sliderwaarde]^4 + 0,000000037948*[Sliderwaarde]^3 - 0,00032204*[Sliderwaarde]^2 + 1,5832*[Sliderwaarde] - 603,09

Maandelijkse inleg (excl. Bankkosten) = 0,045 * [Maximaal mogelijke netto inkomen EZ] + 15

Historische maandelijkse kosten (excl. Bankkosten) = 15 + [schenkvariabele] * [Maximaal mogelijke netto inkomen EZ]

Historisch maandelijks gespaard = [maandelijkse inleg] – [historische maandelijkse kosten]

 

BV:

[Maximaal mogelijke netto inkomen BV] =-0,00000000000049015*[Sliderwaarde]^4 + 0,000000012151*[Sliderwaarde]^3 - 0,0001082*[Sliderwaarde]^2 + 0,77813*[Sliderwaarde] + 92,68

Maandelijkse inleg (excl. Bankkosten) = 0,045 * [Maximaal mogelijke netto inkomen BV] + 15

Historische maandelijkse kosten (excl. Bankkosten) = 15 + [schenkvariabele] * [Maximaal mogelijke netto inkomen BV]

Historisch maandelijks gespaard = [maandelijkse inleg] – [historische maandelijkse kosten]

 

BTW Roland wil elke maand de schenkvariabele kunnen aanpassen, deze is namelijk: totaal geschonken / aantal maanden / inkomen. Voor deze maand is de schenkvariable: 0,00228646.