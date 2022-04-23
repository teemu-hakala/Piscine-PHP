function prompt_todo()
{
	let todo = prompt("add a todo:");
	add_todo(todo, false);
}

function handle_todo_click(e)
{
	if (window.confirm("delete the task: id="
		+ e.target["id"] + ", '" + e.target.innerText + "'?"))
		e.target.remove();
}

window.onload = function ()
{
	let ft_list_ = document.getElementById("ft_list");
	ft_list_.addEventListener("click", function(e) {
		handle_cookies(false, e.target.innerText, e.target["id"])
		handle_todo_click(e);
	});
	load_cookies();
}

function get_cookie(name)
{
	name = name + "=";
	let splits = document.cookie.split(";");
	for (let split = 0; split < splits.length; split++)
	{
		if (splits[split].indexOf(name) >= 0)
		{
			let decoded_value = decodeURI(splits[split].split("=")[1]);
			let decoded_json = JSON.parse(decoded_value);
			return (decoded_json);
		}
	}
	return (false);
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

function load_cookies()
{
	let cookies = get_cookie("todo_list");
	if (cookies)
	{
		let index = 0;
		let obj = {};
		Object.entries(cookies).forEach(cookie => {
			const [key, value] = cookie;
			obj[index++] = value;
		});
		document.cookie = "todo_list=; max-age=-1; path=/;";
		Object.entries(obj).forEach(pair =>
		{
			const [key, value] = pair;
			add_todo(value);
		});
	}
}

function add_todo(todo)
{
	if (typeof add_todo.index === 'undefined')
		add_todo.index = 0;
	if (todo)
	{
		let new_todo = document.createElement("div");
		new_todo.innerText = todo;
		new_todo.setAttribute("id", add_todo.index);
		new_todo.addEventListener("click", handle_todo_click);
		let ft_list = document.getElementById("ft_list");
		if (!ft_list.innerHTML)
			ft_list.innerHTML = new_todo.outerHTML;
		else
			ft_list.innerHTML = new_todo.outerHTML + ft_list.innerHTML;
		handle_cookies(true, new_todo.innerText, add_todo.index++);
	}
}
