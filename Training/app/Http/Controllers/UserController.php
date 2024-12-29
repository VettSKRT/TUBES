namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Friendship;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->has('education')) {
            $query->where('education', $request->education);
        }

        if ($request->has('interest')) {
            $query->where('interest', $request->interest);
        }

        $users = $query->get();
        
        return view('users.index', compact('users'));
    }

    public function addFriend($id)
    {
        $friendship = Friendship::create([
            'user_id' => auth()->id(),
            'friend_id' => $id,
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Friend request sent!');
    }

    public function acceptFriend($id)
    {
        $friendship = Friendship::where('friend_id', auth()->id())
            ->where('user_id', $id)
            ->first();

        if ($friendship) {
            $friendship->update(['status' => 'accepted']);
        }

        return redirect()->back()->with('success', 'Friend request accepted!');
    }

    public function rejectFriend($id)
    {
        $friendship = Friendship::where('friend_id', auth()->id())
            ->where('user_id', $id)
            ->first();

        if ($friendship) {
            $friendship->update(['status' => 'rejected']);
        }

        return redirect()->back()->with('success', 'Friend request rejected!');
    }
}