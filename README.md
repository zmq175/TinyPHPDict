在线中英文词典翻译
=====================
##作者：
浙江工业大学-计算机科学与技术学院-刘元祺
##声明：
浙江工业大学应用软件设计竞赛大一作品
本程序的前端使用了开源的Bootstrap前端开发框架、FontAwesome字体图标进行开发。
此版本的Bootstrap及jquery使用了百度免费提供的CDN加速服务。可以自行替换为本地相同版本。
##开发语言：
PHP+MySQL+JavaScript+HTML+CSS
其中JS使用了jquery框架进行开发。
前端使用了Bootstrap框架。
##实现功能
	*中英文单词互译
	*15000单词储备
	*记录用户最近20个单词查询记录
	*输入首字母或前几个字能出现用户可能需要查找的单词
	*HTML5响应式前端界面
##环境要求：
	*PHP5或以上
	*MySQL 5.6或更高
	*测试使用Apache2.4.9，未在Nginx等环境下测试。
##关于词库：
	本词库是根据互联网免费提供的txt文件自行整理的数据库。
	使用关键字替换，导入正好的xls文件生成。
	作者整理方式、时间较为仓促，望广大同行指正！

##文件结构
│  index.html 						//首页  
│  README.md 						//说明文档  
│  word.xls 						//单词表整理得到Excel文件  
│  search.php 						//搜索单词  
│  content.php 						//内容界面  
│  word.sql 						//数据库备份  
└─includes							//引用目录   
	│		sql_connect.php 		//数据库连接  
	│		is_chinese.php 			//判断输入内容是否中文  
	│		input_decade.php 		//过滤输入内容  
	│		add_to_history.php 		//将词汇查询记录添加入Cookies  
	│		history_response.php 	//ajax调用返回查询历史  
	│		suggestion_response.php //ajax返回搜索建议  
	└─font-awesome				//font awesome字体图标  
