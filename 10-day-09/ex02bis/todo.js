$(window).on("load",
	function ()
	{
		let ft_list_ = document.getElementById("ft_list");
		ft_list_.addEventListener("click", function(e) {
			handle_cookies(false, e.target.innerText, e.target["id"])
			handle_todo_click(e);
		});
		load_cookies();
	}
);

function handle_todo_click(e)
{
	if (window.confirm("delete the task: id="
		+ $(e.target).attr("id") + ", '" + $(e.target).text() + "'?"))
		$(e.target).remove();
}

function get_cookie(name)
{
	let splits = document.cookie.split(";");
	for (let split = 0; split < splits.length; split++)
	{
		if (splits[split].indexOf(name) >= 0)
		{
			let decoded_value = decodeURI(splits[split].split("=")[1]);
			let decoded_json = jQuery.parseJSON(decoded_value);
			return (decoded_json);
		}
	}
	return (false);
}

function load_cookies()
{
	let cookies = get_cookie("todo_list");
	if (cookies)
	{
		cookies = $.makeArray(cookies);
		let obj = $.map(cookies,
			function(val, i)
			{
				return (val);
			}
		);
		document.cookie = "todo_list=; max-age=-1; path=/;";
		$.map(obj[0],
			function (val, i)
			{
				add_todo(val);
			}
		);
	}
}

function handle_cookies(add, text, id)
{
	if (add)
	{
		let got_cookie = get_cookie("todo_list");
		if (!got_cookie)
			got_cookie = {};
		got_cookie[id] = text;
		document.cookie = "todo_list="
			+ encodeURI(JSON.stringify(got_cookie))
			+ "; max-age=86400; path=/;";
	}
	else
	{
		let got_cookie = get_cookie("todo_list");
		delete got_cookie[id];
		document.cookie = "todo_list="
			+ encodeURI(JSON.stringify(got_cookie))
			+ "; max-age=86400; path=/;";
	}
}

function prompt_todo()
{
	let todo = prompt("add a todo:");
	add_todo(todo, false);
}

function add_todo(todo)
{
	if (typeof add_todo.index === 'undefined')
		add_todo.index = 0;
	if (todo)
	{
		$('<div/>',{
			text: todo,
			id: add_todo.index
		}).prependTo('#ft_list');
		handle_cookies(true, todo, add_todo.index++);
	}
}
