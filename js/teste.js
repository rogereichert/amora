var mysql = require('mysql');

var con = mysql.createConnection({
    host: "localhost",
    user: "root",
    password: "",
    database: "mydb"
});

// con.connect(function (err) {
//     if (err) throw err;
//     console.log("Connected!");
//     var sql = "CREATE TABLE customers (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255), address VARCHAR(255))";
//     con.query(sql, function (err, result) {
//         if (err) throw err;
//         console.log("Table created");
//     });
// });

let nome = 'Teste';
let empresa = 'xis';


// INSERIR MÚLTIPLOS

// con.connect(function (err) {
//     if (err) throw err;
//     console.log("Connected!");
//     var sql = "INSERT INTO customers (name, address) VALUES ('teste123', 'olamundo')";
//     con.query(sql, [values], function (err, result) {
//         if (err) throw err;
//         console.log("Number of records inserted: " + result.affectedRows);
//     });
// });


// // Retornando o último ID

// con.connect(function (err) {
//     if (err) throw err;
//     var sql = "INSERT INTO customers (name, address) VALUES ('Michelle', 'Blue Village 1')";
//     con.query(sql, function (err, result) {
//         if (err) throw err;
//         console.log("1 record inserted, ID: " + result.insertId);
//         var returnId = result.insertId;
//         return returnId;
//     });
// });

// // SELECT
// con.connect(function (err) {
//     if (err) throw err;
//     con.query("SELECT * FROM customers", function (err, result, fields) {
//         if (err) throw err;
//         console.log(result);
//     });
// });

// // SELECT CUSTOMIZADO
// con.connect(function (err) {
//     if (err) throw err;
//     con.query("SELECT * FROM customers WHERE address = 'Park Lane 38'", function (err, result) {
//         if (err) throw err;
//         console.log(result);
//     });
// });

// SELECT COM LIKE
// con.connect(function (err) {
//     if (err) throw err;
//     con.query("SELECT * FROM customers WHERE address LIKE 'S%'", function (err, result) {
//         if (err) throw err;
//         console.log(result);
//     });
// });


class Customer {

    selectAllRecords() {
        con.connect(function (err) {
            if (err) throw err;
            con.query("SELECT * FROM customers", function (err, result, fields) {
                if (err) throw err;
                console.log(result);
            });
        });
    }

    insert() {
        con.connect(function (err) {
            if (err) throw err;
            console.log("Connected!");
            var sql = "INSERT INTO customers (name, address) VALUES ('teste123', 'olamundo')";
            con.query(sql, function (err, result) {
                if (err) throw err;
                console.log("Number of records inserted: " + result.affectedRows);
                //this.Customer.selectAllRecords();
            });
        });
    }
}

let customer = new Customer();

customer.selectAllRecords();