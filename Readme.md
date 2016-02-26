# Goal

The goal is to parse taxes.csv file and calculate the net revenu for the person.

## File format

Here is the file format :

```
Name, Birthday
Line 134: int
Line 012: int
Line 023: int
Line 087: bool (either Y/y/yes or N/n/no)
Line 098: int
Line 099: int
Line 101: int
# Ignore comments
(ends with an empty new line)
```

Line definitions are :

  * Line 134 : base income
  * Line 12: number of children
  * Line 23: income from stock market
  * Line 87: whether you paid for public transportation
  * Line 98: Charity donations
  * Line 99: REER
  * Line 101: REEE

## Rules

To calculate the net income, you add line 134 to line 23

Then you substract deductible expenses like this :

  * 500$ for each child
  * 80$ if you paid for public transportation
  * Charity donations
  * REER only if age is less than 65 years old (consider today)
  * Half of the REEE
