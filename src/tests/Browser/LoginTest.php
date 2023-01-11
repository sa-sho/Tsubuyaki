<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testSuccessfulLogin(): void
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create(); //テスト用のユーザーを作成する
            //dd($user);
            $browser->visit('/login')
                ->type('email', $user->email) //テスト用のユーザーのメールアドレスを指定する
                ->type('password', 'password') //パスワードを入力する
                ->press('LOG IN') // 「LOG IN」ボタンをクリック
                ->assertPathIs('/tweet') //tweetに遷移したことを確認する
                ->assertSee('つぶやきアプリ'); //ページ内に「つぶやきアプリ」が表示されていることの確認
        });
    }
}
