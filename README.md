# Lucas Padilha - Tech Test

### Application Business Logic

Design, develop and document an application to calculate salary and salary bonus knowing that

> Staff get their basic monthly pay on the last working day of the month (MON - FRI).

> If the last day of the month is a Saturday or Sunday, the payment date will be the previous Friday.

> On the 10th of every month bonuses are paid for the previous month, unless the 10th is Saturday or Sunday. In that case, staff get their bonuses on the first Tuesday after the 10th.

### Requirements

The application must be CLI based and output a csv file.

The CSV file should contain the **payment dates for the next 12 months**. The CSV should contain a column for the **month name**, a column that contains the **base payment date for that month**, and a column that contains the **bonus payment date**.

---

### How to run the application

##### If you want to use the included docker containers:

- Open your terminal;
- `cd` to `docker` folder;
- type `docker-compose build` to build the container;
- type `docker-compose up -d` to bring the container up;
- type `docker exec -it emporium_tech_test php artisan salary:calculate`.

##### If you wanna use your local PHP installation:

- Open your terminal;
- `cd` to `src` folder;
- type `php artisan salary:calculate`.

Also there's an option `--N|next` which ignores the current month and uses the next month as starting point.

### Running the tests

There's two included tests, the only difference between them is that one uses the `--N|next` option and the other doesn't.

##### Using the docker containers:

After bringing up the container:
- Open your terminal;
- type `docker exec -it emporium_tech_test php artisan test`.

##### With your local PHP installation:

- Open your terminal;
- type `php artisan test`.

