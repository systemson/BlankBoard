<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')->insert([
            [
                'name' => 'Packs',
            	'order' => 3,
            	'content' => '<div class="panel">
	<div class="container">
		<div class="card-group">
			<div class="card">
				<div class="card-header bg-custom">

					<h5>Ebay + Paypal Accounts</h5>
				</div>
				<div class="card-body no-padding">

					<h6 class="px-3">Limits 500 items or $25,000 Monthly</h6>

					<p class="px-3">Includes:</p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">Google Voice</li>
						<li class="list-group-item">Virtual Credit Card</li>
						<li class="list-group-item">Bank Account</li>
					</ul>
				</div>
				<div class="card-footer">

					<p>Price: $61 <a class="btn btn-primary" href="#">Order</a></p>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-custom">

					<h5>Ebay + Paypal Accounts</h5>
				</div>
				<div class="card-body no-padding">

					<h6 class="px-3">Limits 1,000 items or $25,000 Monthly</h6>

					<p class="px-3">Includes:</p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">Google Voice</li>
						<li class="list-group-item">Virtual Credit Card</li>
						<li class="list-group-item">Bank Account</li>
						<li class="list-group-item">There is an extra Verification Process (Contact us).</li>
					</ul>
				</div>
				<div class="card-footer">

					<p>Price: $73 <a class="btn btn-primary" href="#">Order</a></p>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-custom">

					<h5>Ebay + Paypal Accounts</h5>
				</div>
				<div class="card-body no-padding">

					<h6 class="px-3">Limits 5,000items or $50,000 Monthly</h6>

					<p class="px-3">Includes:</p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">Business Ebay Account</li>
						<li class="list-group-item">Google Voice</li>
						<li class="list-group-item">Virtual Credit Card</li>
						<li class="list-group-item">Bank Account</li>
						<li class="list-group-item">There is an extra Verification Process on paypal included.</li>
					</ul>
				</div>
				<div class="card-footer">

					<p>Price: $119 <a class="btn btn-primary" href="#">Order</a></p>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-custom">

					<h5>No Category restriction Accounts</h5>
				</div>
				<div class="card-body no-padding">

					<p class="px-3">Includes:</p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">Google Voice</li>
						<li class="list-group-item">Virtual Credit Card</li>
						<li class="list-group-item">Virtual Bank Account</li>
					</ul>
					<br>

					<p class="px-3"><strong>Note:</strong> On these accounts, you have to ask what Limits we have available such as:</p>

					<ul class="list-group list-group-flush">
						<li class="list-group-item">10 items $1,000</li>
						<li class="list-group-item">500 items $25,000</li>
						<li class="list-group-item">1,000 items $25,000</li>
						<li class="list-group-item">5,000 items or $50,000</li>
					</ul>
				</div>
				<div class="card-footer">

					<p>Price: Contact us. <a class="btn btn-primary" href="#">Order</a></p>
				</div>
			</div>
			<div class="card">
				<div class="card-header bg-custom">

					<h5>Others</h5>
				</div>
				<div class="card-body no-padding">

					<ul class="list-group list-group-flush">
						<li class="list-group-item">New Paypal Accounts</li>
						<li class="list-group-item">Virtual Credit Card</li>
						<li class="list-group-item">Bank Account</li>
					</ul>
				</div>
				<div class="card-footer">

					<p><a class="btn btn-primary" href="#">Order</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Intro',
            	'order' => 1,
            	'content' => '
  <div class="panel">
    <div class="container text-center">
      <div class="col-sm-8 offset-sm-2">
        <h1>Why Beststealthaccs?</h1>
        <p class="d-none d-md-block">We make our stealth accounts with the best resources in the whole market, using real USA ips. So these accounts are perfect for your dropshipping biz. We will guide you on how to work your stealth accounts and reducing to the minimum of getting red flags when working on them. </p>
        <p class="d-none d-md-block">We have a vast experice on Ebay and Paypal Business. So, don’t Worry you are safe with us!</p>
      </div>
    </div>
  </div>',
            	'created_at' => Carbon::now(),
            	'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
