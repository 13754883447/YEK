class Content extends React.Component{
    render(){
        let {section}=this.props;
        return(
            <section className="CT-section padding-slide">
                <div className="CT-header">
                    <h1>{section.title}</h1>
                </div>
                <div className="laiyuan">
                    <span className="CT-touxiang">
                        <img src={section.touxiang} alt="" className="CT-touxiangimg"/>
                        <span className="CT-mask"> </span>
                    </span>
                    <span className="CT-xinxi">
                        <div>
                            <span className="CT-name">
                                {section.from}
                            </span>
                            <img src="https://s3b.pstatp.com/growth/mobile_detail/image/toutiaohao_tag_bc28ef08.svg" alt="" className="CT-renzheng"/>
                        </div>
                        <div>
                            <span className="CT-time">{section.time}</span>
                            <span className="dot"> </span>
                            <span className="CT-pinlun">
                                {section.commentaries}评论
                            </span>
                        </div>
                    </span>
                    <a href="javascript:;" className="CT-guanzhu">关注</a>
                </div>
                <div className="CT-content">
                    <div>
                        <p>
                            {section.p1}
                        </p>
                        <p className="CT-imgbox">
                            <img src={section.img} alt=""/>
                        </p>
                    </div>
                </div>
            </section>
        )
    }
}
class Tj extends React.Component{
    render(){
        let {tj}=this.props;
        let tja=tj.map(v=>(
            <a href="" key={v.id}>
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
                            <span className="red">
                                打开App
                            </span>
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
        ));
        return(
            <div className="Tj-item">
                <h3 className="Tj-title">
                    热门推荐
                </h3>
                <div className="Tj-section">
                    {tja}
                </div>
            </div>
        )
    }
}
class Gg extends React.Component{
    render(){
        let {guanggao}=this.props;
        return(
            <div className="guanggao">
                <section>
                    <div className="CT-guanggaobox">
                        <div className="list-img-large">
                            <img src={guanggao.img} alt=""/>
                            <span className="guanggao-lb"> </span>
                        </div>
                        <div className="item1-info">
                            <span>{guanggao.xinxi}</span>
                        </div>
                    </div>
                </section>
            </div>
        )
    }
}
class Foot extends React.Component{
    render(){
        let {foot}=this.props;
        let footli=foot.map(v=>(
            <a href="" key={v.id}>
                <div className="flex-container">
                    <div className="xihuan-left">
                        <img src={v.img} alt=""/>
                    </div>
                    <div className="xihuan-right">
                        <span>{v.title}</span>
                        <div className="item1-info">
                            <div>
                                <span className="red">打开App</span>
                                <span>{v.source}</span>
                                <span>{v.commentaries}条评论</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        ));
        return(
            <div className="Tj-item">
                <h3 className="Tj-title">
                    热门推荐
                </h3>
                <div className="Tj-section">
                    {footli}
                </div>
            </div>
        )
    }
}
class Bd extends React.Component{
    constructor(){
        super();
        this.state={
            section:{},
            tj:[],
            guanggao:{},
            foot:[]
        }
    }

    componentDidMount(){
        this.setState({
            section:{id:1,title:'查处丨涉企乱收费！发改委曝光一批典型案件 这些单位榜上有名！',
                from:'河南经济报豫南读本',touxiang:'https://p3.pstatp.com/thumb/382e001063b198c7528a',time:'2小时前',p1:'近日，在全国部署开展的涉企收费专项检查中，国家发展改革委价格主管部门查处了一批隐蔽性乱收费案件，部分电子政务平台和行政审批中介服务机构违规收费现象突出。',img:'https://p3.pstatp.com/large/3b0e0002b65a46265bdd',commentaries:21},
            tj:[
                {id:1,title:'重大新闻到！家里有这3种材料的赶紧丢掉，都是白血病的头',img:'https://p3.pstatp.com/list/3b0000010e377d778a58',img2:'https://p3.pstatp.com/list/3b0000010f9c5117faf5',img3:'https://p3.pstatp.com/list/3afc00013a0168e4f8b4',source:'那些故事汇',commentaries:'13',time:'1个小时钱',state:0,lanmuid:1}
            ],
            guanggao:{
                id:1,img:'http://p3.pstatp.com/origin/32f40006b84e6271c829',xinxi:'快抢，天然黑曜石，错过在等一年！'
            },
            foot:[
                {id:1,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:2,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:3,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:4,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:5,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:6,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:7,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:8,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1},
                {id:9,title:'四分钟速览《辉煌中国》第一集《圆梦工程》',img:'http://p1.pstatp.com/video1609/3b090002d0ccc26c0e99',source:'央视新闻',commentaries:1,state:1,lanmuid:1}
            ]
        })
    }

    render(){
        return(
            <div>
                <Content section={this.state.section}/>
                <Tj tj={this.state.tj}/>
                <Gg guanggao={this.state.guanggao}/>
                <Foot foot={this.state.foot}/>
            </div>
        )
    }
}
ReactDOM.render(<Bd/>,document.querySelector('#main'));