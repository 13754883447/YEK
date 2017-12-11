class SearchShow extends React.Component{
    constructor(){
        super();
        this.state={
            hotwords:[]
        }
    }

    componentDidMount(){
        this.setState({
            hotwords:[
                {id:1,title:'ios11正式发布',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:2,title:'女司机贴字条卖萌',url:'https://m.toutiao.com/search/?from=hotword&keyword=%E5%A5%B3%E5%8F%B8%E6%9C%BA%E8%B4%B4%E5%AD%97%E6%9D%A1%E5%8D%96%E8%90%8C&hot_words=1'},
                {id:3,title:'张艺兴被起诉',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:4,title:'扇耳光为小孩出气',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:5,title:'王毅会见基辛格',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:6,title:'二维码过检验机',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:7,title:'C919再获订单',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:8,title:'汪涵杨乐乐疑被骗',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:9,title:'女幼师遭枪击身亡',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
                {id:10,title:'小偷留下求爱信',url:'https://m.toutiao.com/search/?from=hotword&keyword=ios11%E5%8F%91%E6%AD%A3%E5%BC%8F%E7%89%88&hot_words=1'},
            ]
        })
    }

    render() {
        let hotwords=this.state.hotwords;
        let li=hotwords.map(v=>(
            <li key={v.id}>
                <a href={v.url}>
                    {v.title}
                </a>
            </li>
        ));
        return (
            <div className="hot_words">
                <ul className="toutiao">
                    {li}
                </ul>
            </div>
        )
    }
}
ReactDOM.render(<SearchShow/>,document.querySelector('#search-show'));