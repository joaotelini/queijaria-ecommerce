const mysql = require('mysql');

// Configuração da conexão
const connection = mysql.createConnection({
  host: 'localhost', // Seu host MySQL
  user: 'root',
  password: '',
  database: 'db_sitio3irmaos'
});

// Conectar ao MySQL
connection.connect((err) => {
  if (err) {
    console.error('Erro ao conectar: ', err.stack);
    return;
  }
  console.log('Conexão bem sucedida ao MySQL.');
});

// Exemplo de consulta
connection.query('SELECT * FROM usuario', (error, results, fields) => {
  if (error) throw error;
  console.log('Registros recuperados da tabela: ', results);
});

// Fechar conexão após consulta
connection.end();
