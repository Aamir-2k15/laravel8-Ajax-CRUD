<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = Article::all()->sortByDesc("id");
        //return view('articles', compact('articles'));
        if ($result->count() > 0) {
            $n = 1;
            foreach ($result as $row) {
                ob_start();
                $articles[] = "";
                ?>
<tr id="<?php echo $n; ?>">
    <td scope="row"><?php echo $row["id"]; ?></td>
    <td><?php echo $row["title"]; ?></td>
    <td id="row_body"><?php echo $row["body"]; ?></td>
    <td>
        <a href="javascript:void(0)" class="btn btn-outline-secondary view" title="View" data-id="<?php echo $row["id"]; ?>">
        <i class="fas fa-eye"></i>
        </a>

        <a href="javascript:void(0)" class="btn btn-outline-primary edit" title="Edit" data-id="<?php echo $row["id"]; ?>">
        <i class="fas fa-pencil-square-o" aria-hidden="true"></i>
        </a>

        <a href="javascript:void(0)" class="btn btn-outline-danger delete" title="Delete" data-id="<?php echo $row["id"]; ?>">
            <i class="fas fa-trash" aria-hidden="true"></i>
        </a>
    </td>
</tr>
                <?php

                $record = ob_get_clean();
                $articles[] .= $record;
                $status = 1;
                $message = "";
                $n++;
            }

        } else {
            $message = "No recrods found!";
            $status = 0;
        }
        echo json_encode(array('Status' => $status, 'MSG' => $message, 'articles' => $articles));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        Article::create($request->all());
        $message =  "New record created successfully";
        $status = 1;
        echo json_encode(array('Status' => $status, 'MSG' => $message));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        // return view('show', compact('article'));
         $status = 1;
         $message = 1;
        echo json_encode(array('Status' => $status, 'MSG' => $message, 'article'=>$article));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        // return view('edit', compact('article'));
        $status = 1;
        $message = 1;
       echo json_encode(array('Status' => $status, 'MSG' => $message, 'article'=>$article));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);
        $article->update($request->all());
        // return redirect()->route('article.index');
        $status = 1;
        $message = "Updated Successfully";
       echo json_encode(array('Status' => $status, 'MSG' => $message, 'article'=>$article));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        // return redirect()->route('article.index');
        $status = 1;
        $message = "Deleted Successfully";
       echo json_encode(array('Status' => $status, 'MSG' => $message, 'article'=>$article));
    }
}
