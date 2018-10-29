define(['rql/query'], function (Query) {
	function prettyJsonFormatter(json) {
		json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
		let prettyJson = json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
			let cls = 'number';
			if (/^"/.test(match)) {
				if (/:$/.test(match)) {
					cls = 'key';
				} else {
					cls = 'string';
				}
			} else if (/true|false/.test(match)) {
				cls = 'boolean';
			} else if (/null/.test(match)) {
				cls = 'null';
			}
			return `<span class=${cls}>${match}</span>`;
		});
		return `<pre>${prettyJson}</pre>`;
	}

	function taskUpdateAction(row, webhookUrl) {
		const xhr = require('dojo/request');
		try {
			xhr.post(webhookUrl, {
				data: JSON.stringify({id: row.data.id}),
				headers: {
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				}
			});
		} catch (error) {
			alert('Не удалось выполнить задачу');
			console.error(error);
		}
	}

	const queueStoreName = 'test-queues-csv';

	return [
		{
			'id': 'deleteFromDatastoreAction',
			'func': function (dataRow, datastoreName) {
				const itemId = dataRow.id;
				fetch(new Request(`api/datastore/${datastoreName}/${itemId}`, {method: 'DELETE'}));
			}
		},
		{
			"id": "preserveNewLine",
			"func": function (value, object) {
				if (value === null) {
					return '<span style="color: lightgray">null</span>'
				}
				return `<pre>${value}</pre>`
			}

		},
	];
});