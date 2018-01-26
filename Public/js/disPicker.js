$(function() {
			// demo 1
			var data = [{
					title: '东区',
					type: 'folder',
					products: [{
							title: '安徽',
							type: 'item'
						},
						{
							title: '湖北',
							type: 'item'
						},
						{
							title: '湖南',
							type: 'item'
						},
						{
							title: '江苏',
							type: 'item'
						},
						{
							title: '江西',
							type: 'item'
						},
						{
							title: '上海',
							type: 'item'
						},
						{
							title: '浙江',
							type: 'item'
						},
					]
				},

				
			];

			$('#firstTree').tree({
				dataSource: function(options, callback) {
					// 模拟异步加载
					setTimeout(function() {
						callback({
							data: options.products || data
						});
					}, 400);
				},
				multiSelect: false,
				cacheItems: true,
				folderSelect: false
			});
			
			
			
			var dataTwo = [{
					title: '南区',
					type: 'folder',
					products: [{
							title: '福建',
							type: 'item'
						},
						{
							title: '广东',
							type: 'item'
						},
						{
							title: '广西',
							type: 'item'
						},
						{
							title: '海南',
							type: 'item'
						},
						
					]
				},

				
			];
			$('#secondTree').tree({
				dataSource: function(options, callback) {
					// 模拟异步加载
					setTimeout(function() {
						callback({
							data: options.products || dataTwo
						});
					}, 400);
				},
				multiSelect: false,
				cacheItems: true,
				folderSelect: false
			});
			
			
			var dataThird = [{
					title: '西区',
					type: 'folder',
					products: [{
							title: '甘肃',
							type: 'item'
						},
						{
							title: '贵州',
							type: 'item'
						},
						{
							title: '宁夏',
							type: 'item'
						},
						{
							title: '青海',
							type: 'item'
						},
						{
							title: '陕西',
							type: 'item'
						},
						{
							title: '四川',
							type: 'item'
						},
						{
							title: '重庆',
							type: 'item'
						},
						{
							title: '云南',
							type: 'item'
						},
						{
							title: '新疆',
							type: 'item'
						},
						{
							title: '西藏',
							type: 'item'
						},
					]
				},

				
			];
			$('#thirdTree').tree({
				dataSource: function(options, callback) {
					// 模拟异步加载
					setTimeout(function() {
						callback({
							data: options.products || dataThird
						});
					}, 400);
				},
				multiSelect: false,
				cacheItems: true,
				folderSelect: false
			});
			
			
						var dataFourth = [{
					title: '北区',
					type: 'folder',
					products: [{
							title: '北京',
							type: 'item'
						},
						{
							title: '河北',
							type: 'item'
						},
						{
							title: '河南',
							type: 'item'
						},
						{
							title: '黑龙江',
							type: 'item'
						},
						{
							title: '吉林',
							type: 'item'
						},
						{
							title: '辽宁',
							type: 'item'
						},
						{
							title: '内蒙古',
							type: 'item'
						},
						{
							title: '山东',
							type: 'item'
						},
						{
							title: '山西',
							type: 'item'
						},
						{
							title: '天津',
							type: 'item'
						},
					]
				},

				
			];
			$('#fourthTree').tree({
				dataSource: function(options, callback) {
					// 模拟异步加载
					setTimeout(function() {
						callback({
							data: options.products || dataFourth
						});
					}, 400);
				},
				multiSelect: false,
				cacheItems: true,
				folderSelect: false
			});
	
	});