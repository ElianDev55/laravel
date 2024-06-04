<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        $roles1 = Role::create(['name' => 'admin']);
        $roles2 = Role::create(['name' => 'colaborador']);
        $roles3 = Role::create(['name' => 'empleado']);

        $user1 = User::find(1);
        $user1->roles()->attach($roles1);

        $user2 = User::find(2);
        $user2->roles()->attach($roles2);
        
        $user3 = User::find(3);
        $user3->roles()->attach($roles3);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
