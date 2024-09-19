<!-- NEW SECTION MODAL WINDOW -->
<div class="modal fade show in" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="sectionModalLabel"

    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" style="margin-right: auto;" id="sectionModalLabel"><b>New Topic</b></h4>
                <button type="button" class="close" style="margin-left: auto;" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form data-action="{{ URL::to('/panel/course/save')}}" method="POST" enctype="multipart/form-data" id="sectiofrm">
                <div class="modal-body">
                    @csrf
                    <h6>Topic Name*</h6>
                    <input type="text" class="form-control custom-inner-style" placeholder="Section title here" name="sectiontitle" id="sectiontitle">
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror 
                    
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn exit" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn save">Add Topic</button>
                </div>
            </form>
        </div>
    </div>
</div>