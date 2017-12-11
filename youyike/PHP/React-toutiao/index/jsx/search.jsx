class Search extends React.Component{
    render(){
        return(
            <form action="" method="post" id="search_form">
                <div id="search_content">
                    <a href="" className="search-icon  search-toutiao">

                    </a>
                    <div className="search-arrowdown">

                    </div>
                    <input type="search" placeholder="请输入搜索关键词" id="search_input"/>
                    <input type="hidden" name="from" id="from" value="search_tab"/>
                </div>
            </form>
        )
    }
}
ReactDOM.render(<Search/>,document.querySelector('#search'));