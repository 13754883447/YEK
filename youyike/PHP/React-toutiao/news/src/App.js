import js from './js/rem';
import React, {Component} from 'react';
import {
    BrowserRouter as Router,
    Route,
    Link
} from 'react-router-dom'
import './css/css.css';
import Home from "./Home/index";
import SearchPage from "./search/index";
import Channel from './channel/index';
import Particulars from './particulars/index';

class App extends Component {
    constructor() {
        super();
        this.state = {
            categories: [],//Home 数据 分类
            news: [],
            SearchNews:[]
        };
        this.active_change = this.active_change.bind(this);
        this.Show = this.Show.bind(this);
        this.Search = this.Search.bind(this);
    }

    get_cates() {
        if (window.localStorage.categories) {
            this.setState({
                categories: JSON.parse(window.localStorage.categories)
            })
        } else {
            fetch('/api/get_cates')
                .then(res => res.json())
                .then(r => {
                    this.setState({
                        categories: r
                    });
                    window.localStorage.categories = JSON.stringify(r);
                })
        }
    }//栏目

    get_news() {
        fetch('/api/get_news')
            .then(res => res.json())
            .then(r => {
                this.setState({
                    news: r
                })
            })
    }//新闻


    get_channel() {
        this.setState({
            channel: JSON.parse(window.localStorage.categories)
        })
    }//栏目管理

    Show(id){//更改显示
        let r = JSON.parse(window.localStorage.categories);
        r.filter(v => {
            if (v.id === id) {
                v.isshow = !v.isshow;
            }
        });
        window.localStorage.categories = JSON.stringify(r);
        this.setState({
            categories:r
        });
    }
    active_change(id) {//切换
        fetch('/api/get_newsother?cid='+id)
            .then(res=>res.json())
            .then(r=>{
                this.setState({
                    news: r,//Home 数据 分类
                })
            });
        let r = JSON.parse(window.localStorage.categories);
        r.filter(v => {
            v.active = 0;
            if (v.id === id) {
                v.active = 1;
            }
        });
        window.localStorage.categories = JSON.stringify(r);
        this.setState({
            categories:r,
        })
    }
    ZZ(){//遮罩
            let zz=document.querySelector('.zhezhao');
            zz.classList.add('Active')
    }
    Close(){
        let zz=document.querySelector('.zhezhao');
        zz.classList.remove('Active')
    }
    shuaxin(){
        window.location.reload();
    }
    Location(url){
        console.log(url)
        window.localStorage.url=JSON.stringify(url);
    }

    Search(e){//搜索
        console.log(e.keyCode);
        if(e.keyCode==13){
            e.preventDefault();
            let hot = document.querySelector('.hot_words');
            hot.classList.add('none');
            let search_input=document.querySelector('#search_input');
            fetch('/api/like_string',{
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({string:search_input.value})
            })
                .then(res=>res.json())
                .then(r=>{
                    this.setState({
                        SearchNews:r
                    })
                })
            let Searchnone=document.querySelector('.Searchnone');
            Searchnone.classList.add('block')
    }
    }


    componentDidMount(){
        this.get_cates();
        this.get_news();
        this.get_channel();
    }


    render() {
        return (
            <Router>
                <div>
                    <Route exact path="/" render={() => <Home categories={this.state.categories} news={this.state.news} active_change={this.active_change} active={this.state.active} ZZ={this.ZZ} Close={this.Close} shuaxin={this.shuaxin} Location={this.Location}/>}/>
                    <Route path="/Search" render={() => <SearchPage news={this.state.news} keydown={this.Search} SearchNews={this.state.SearchNews}/>}/>
                    <Route path="/Channel" render={() => <Channel categories={this.state.categories} SS={this.Show}/>}/>
                    <Route path="/Particulars" render={() => <Particulars Location={this.Location}/>}/>
                </div>
            </Router>
        );
    }
}

export default App;
