class Menu extends React.Component {
    constructor() {
        super();
        this.state = {
            active:1,
            lanmu: []
        }
    }

    componentDidMount() {
        this.setState({
            lanmu: [
                {id: 1, name: '推荐', url: '#/'},
                {id: 2, name: '视频', url: '#/'},
                {id: 3, name: '动漫', url: '#/'},
                {id: 4, name: '社会', url: '#/'},
                {id: 5, name: '娱乐', url: '#/'},
                {id: 6, name: '军事', url: '#/'},
                {id: 7, name: '科技', url: '#/'},
                {id: 8, name: '汽车', url: '#/'},
                {id: 9, name: '体育', url: '#/'},
                {id: 10, name: '财经', url: '#/'},
                {id: 11, name: '国际', url: '#/'},
                {id: 12, name: '时尚', url: '#/'},
                {id: 13, name: '游戏', url: '#/'},
                {id: 14, name: '美食', url: '#/'},
                {id: 15, name: '美文', url: '#/'},
                {id: 16, name: '故事', url: '#/'},
                {id: 17, name: '旅游', url: '#/'},
                {id: 18, name: '养生', url: '#/'}
            ]
        });
    }

    render() {
        let lanmu = this.state.lanmu;
        let lis = lanmu.map(v => (
            <a href={v.url} key={v.id}>
                {v.name}
            </a>
        ));
        return (
            <div className="appbox">
                <div className="Abox">
                    {lis}
                </div>
                <div className="abA">
                    <div className="shadow">
                    </div>
                    <a href="channels.html" className="iconfont icon-jia">
                    </a>
                </div>
            </div>
        )
    }
}
class Section extends React.Component {
    constructor() {
        super();
        this.state= {
            data:[
                {id:1,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:2,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:3,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:4,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:5,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:6,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:7,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:8,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:9,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1}
            ],
            data2:[
                {id:1,title:'重大新闻到！家里有这3种材料的赶紧丢掉，都是白血病的头',img:'https://p3.pstatp.com/list/3b0000010e377d778a58',img2:'https://p3.pstatp.com/list/3b0000010f9c5117faf5',img3:'https://p3.pstatp.com/list/3afc00013a0168e4f8b4',source:'那些故事汇',commentaries:'13',time:'1个小时钱',state:0,lanmuid:1}
            ],
            data3:[
                {id:1,title:'挑战开发速度！10分钟搭建微信小程序',img:'http://p9.pstatp.com/large/380c0017018408634366',source:'腾讯云',commentaries:'0',time:'7分钟前',state:0,lanmuid:1}
            ],
            shipin:[
                {id:1,title:'美国教授问你们中国有电脑吗？李彦宏的回答惊艳了全场',img:'http://p3.pstatp.com/video1609/3ac40007111f2351d5c9',source:'一笑而过1957',commentaries:15,time:'23分钟前',state:0,lanmuid:2}
            ]
        }
    };


    render() {
        let {data,data2,data3,shipin}=this.state;
        let sections=shipin.map(v=>(
            /* 样式1
            <a href="" key={v.id}>
    <div className="section-item1">
        <h3>
            {v.title}
        </h3>
        <div className="item1-info">
            <div>
                            <span>
                                {v.source}
                            </span>
                <span>
                                {v.commentaries}
                            </span>
            </div>
        </div>
    </div>
    <div className="section-item2">
        <img src="https://p3.pstatp.com/list/3b060001d20d4da78bcf" alt=""/>
    </div>
</a>*/
           /* <a href="" key={v.id}> 样式2
                <div className="section-detail">
                    <h3>
                        {v.title}
                    </h3>
                    <div className="detail-imgbox">
                        <ul>
                            <li>
                                <img src={v.img} alt=""/>
                            </li>
                            <li>
                                <img src={v.img2} alt=""/>
                            </li>
                            <li>
                                <img src={v.img3} alt=""/>
                            </li>
                        </ul>
                    </div>
                    <div className="item1-info">
                        <div>
                            <span>
                                {v.source}
                            </span>
                            <span>
                                评论{v.commentaries}
                            </span>
                        </div>
                    </div>
                </div>
            </a>*/

           /*样式3
           <a href="" key={v.id}>
                <div className="section-detail">
                    <h3>
                        {v.title}
                    </h3>
                    <div className="detail-imgbox">
                        <img src={v.img} alt=""/>
                    </div>
                    <div className="item1-info">
                        <div>
                            <span>
                                {v.source}
                            </span>
                            <span>
                                评论{v.commentaries}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            */
            <a href="Content.html" key={v.id}>
                <div className="item-video">
                    <div className="video-box">
                        <div className="video-mask">
                        </div>
                        <h3 className="video-title">
                            {v.title}
                        </h3>
                        <img src={v.img} alt=""/>
                        <span className="video-btn"></span>
                    </div>
                    <div className="item1-info">
                        <div>
                            <span>
                                {v.source}
                            </span>
                            <span>
                                评论{v.commentaries}
                            </span>
                            <span>
                                {v.time}
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        ));
        return (
            <div className="sectionbox">
                <section className="sectionAbox">
                    {sections}
                </section>
            </div>
        )
    }
}
class Body extends React.Component{
    render(){
        return(
            <div>
                <Menu/>
                <Section/>
            </div>
        )
    }
}
ReactDOM.render(<Body/>,document.querySelector('#Menu'));