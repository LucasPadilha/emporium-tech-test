# Lucas Padilha - Tech Test

### Application Business Logic

Design, develop and document an application to calculate salary and salary bonus knowing that

> Staff get their basic monthly pay on the last working day of the month (MON - FRI).

> If the last day of the month is a Saturday or Sunday, the payment date will be the previous Friday.

> On the 10th of every month bonuses are paid for the previous month, unless the 10th is Saturday or Sunday. In that case, staff get their bonuses on the first Tuesday after the 10th.

### Requirements

The application must be CLI based and output a csv file.

The CSV file should contain the **payment dates for the next 12 months**. The CSV should contain a column for the **month name**, a column that contains the **base payment date for that month**, and a column that contains the **bonus payment date**.