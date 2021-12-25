const express = require('express');

const app = express();

app.use(express.json());


app.get('/flag', (req, res) => {
	res.redirect('/flag/0');

});


app.get('/flag/:num', (req, res) => {
	try {

		const { num } = req.params;



		if ( isNaN(num / 2) ) {
			const erro = new Error('PH{}');
			Error.stackTraceLimit(this, erro);
			throw erro;
		}

		return res.send('You must to use current number to view the flag.');
	} catch (error) {
		error.message = 'PH{MiRM0_ls_cU7e-!!}';
		res.status(500).send(error.stack);
	}
});

app.use('/', express.static('./public'));

const PORT = 5000;
const server = app.listen(PORT, () =>
  console.log(`Server is running on port ${PORT}...`)
);
