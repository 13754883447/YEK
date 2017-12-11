class Pd extends React.Component{
    render(){
        return(
            <div className="header">
                <div>
                    <a href="index.html" className="iconfont icon-fanhui">
                    </a>
                </div>
                <div>
                    <span>频道管理</span>
                </div>
                <div>
                    <a>
                    </a>
                </div>
            </div>
        )
    }
}

ReactDOM.render(<Pd/>,document.querySelector('#header'));