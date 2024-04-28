<?php
    loadPartial("head");
?>
<?php
    loadPartial("navbar");
?>
<?php
    loadPartial("top-banner");
?>
    <section>
      <div class="container mx-auto p-4 mt-4">
        <div class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">所有实习</div>
        <!-- 实习列表具体内容，根据需要自行调整 -->

        <!-- 实习列表 -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
          <!-- 实习职位1: 软件开发实习生 -->
          <div class="rounded-lg shadow-md bg-white">
            <div class="p-4">
              <h2 class="text-xl font-semibold">软件开发实习生</h2>
              <p class="text-gray-700 text-lg mt-2">
                我们正在寻找软件开发实习生，参与开发高质量的软件解决方案。
              </p>
              <ul class="my-4 bg-gray-100 p-4 rounded">
                <li class="mb-2"><strong>薪资:</strong> ¥80000</li>
                <li class="mb-2">
					<strong>位置:</strong> 广州
					<span class="text-xs bg-blue-500 text-white rounded-full px-2 py-1 ml-2">
						校内
					</span>
				</li>
                <li class="mb-2"><strong>标签:</strong> <span>开发</span>, <span>编程</span></li>
              </ul>
              <a href="details.html"
                class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200"
              >
                详情
              </a>
            </div>
          </div>
		</div>
	</section>
<?php
    loadPartial("bottom-banner");
?>
<?php
    loadPartial("footer");
?>