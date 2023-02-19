fetch('graph.json')
  .then(res=> res.json())
  .then(data => console.log(data))
const dropdowns = document.querySelectorAll('.dropdown');
dropdowns.forEach(dropdown => {
   const select = dropdown.querySelector('.select');
   const caret = dropdown.querySelector('.caret');
   const menu = dropdown.querySelector('.menu');
   const options = dropdown.querySelectorAll('.menu li');
   const selected = dropdown.querySelector('.selected');
   select.addEventListener('click', () => {
      select.classList.toggle('select-clicked');
      caret.classList.toggle('caret-rotate');
      menu.classList.toggle('menu-open');
   });
   options.forEach(option => {
      option.addEventListener('click', () => {
         selected.innerText = option.innerText;
         select.classList.remove('select-clicked');
         caret.classList.remove('caret-rotate');
         menu.classList.remove('menu-open');
         options.forEach(option => {
            option.classList.remove('active');
         }); 
         option.classList.add('active');
      });
   });
});

anychart.onDocumentReady(function () {
   var dataSet = anychart.data.set(getData());
   var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });
   var secondSeriesData = dataSet.mapAs({ x: 0, value: 2 });
   var thirdSeriesData = dataSet.mapAs({ x: 0, value: 3 });
   var chart = anychart.line();
   chart.animation(true);
   chart.padding([10, 20, 5, 20]);
   chart.crosshair().enabled(true).yLabel(false).yStroke(null);
   chart.tooltip().positionMode('point');
   chart.title(
     'Trend of Sales of the Most Popular Products of ACME Corp.'
   );
   chart.yAxis().title('Number of Bottles Sold (thousands)');
   chart.xAxis().labels().padding(5);
   var firstSeries = chart.line(firstSeriesData);
   firstSeries.name('Brandy');
   firstSeries.hovered().markers().enabled(true).type('circle').size(4);
   firstSeries
     .tooltip()
     .position('right')
     .anchor('left-center')
     .offsetX(5)
     .offsetY(5);
   var secondSeries = chart.line(secondSeriesData);
   secondSeries.name('Whiskey');
   secondSeries.hovered().markers().enabled(true).type('circle').size(4);
   secondSeries
     .tooltip()
     .position('right')
     .anchor('left-center')
     .offsetX(5)
     .offsetY(5);
   var thirdSeries = chart.line(thirdSeriesData);
   thirdSeries.name('Tequila');
   thirdSeries.hovered().markers().enabled(true).type('circle').size(4);
   thirdSeries
     .tooltip()
     .position('right')
     .anchor('left-center')
     .offsetX(5)
     .offsetY(5);
   chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);
   chart.container('container');
   chart.draw();
 });

 function getData() {
   return [
     ['1986', 3.6, 2.3, 2.8, 11.5],
     ['1987', 7.1, 4.0, 4.1, 14.1],
     ['1988', 8.5, 6.2, 5.1, 17.5],
     ['1989', 9.2, 11.8, 6.5, 18.9],
     ['1990', 10.1, 13.0, 12.5, 20.8],
     ['1991', 11.6, 13.9, 18.0, 22.9],
     ['1992', 16.4, 18.0, 21.0, 25.2],
     ['1993', 18.0, 23.3, 20.3, 27.0],
     ['1994', 13.2, 24.7, 19.2, 26.5],
     ['1995', 12.0, 18.0, 14.4, 25.3],
     ['1996', 3.2, 15.1, 9.2, 23.4],
     ['1997', 4.1, 11.3, 5.9, 19.5],
     ['1998', 6.3, 14.2, 5.2, 17.8],
     ['1999', 9.4, 13.7, 4.7, 16.2],
     ['2000', 11.5, 9.9, 4.2, 15.4],
     ['2001', 13.5, 12.1, 1.2, 14.0],
     ['2002', 14.8, 13.5, 5.4, 12.5],
     ['2003', 16.6, 15.1, 6.3, 10.8],
     ['2004', 18.1, 17.9, 8.9, 8.9],
     ['2005', 17.0, 18.9, 10.1, 8.0],
     ['2006', 16.6, 20.3, 11.5, 6.2],
     ['2007', 14.1, 20.7, 12.2, 5.1],
     ['2008', 15.7, 21.6, 10, 3.7],
     ['2009', 12.0, 22.5, 8.9, 1.5]
   ];
}
function addFavorite(a) {
   var title = document.title;
   var url = document.location;
   try {
      window.external.AddFavorite(url, title);
   }
   catch (e) {
      try {
         window.sidebar.addPanel(title, url, "");
      }
      catch (e) {
         if (typeof (opera) == "object" || window.sidebar) {
            a.rel = "sidebar";
            a.title = title;
            a.url = url;
            a.href = url;
            return true;
         }
         else {
            alert('Кликните Ctrl+D, чтобы добавить страницу в закладки');
         }
      }
   }
   return false;
}