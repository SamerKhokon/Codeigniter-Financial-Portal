SELECT `code`,`ytp`,cur_mpb,prev_7day_mpv,prev_1month_mpv,prev_3month_mpv,prev_6month_mpv,
prev_1year_mpv,prev_2year_mpv,prev_3year_mpv,
((cur_mpb-prev_7day_mpv)/prev_7day_mpv)*100 AS mpb7,
((cur_mpb-prev_1month_mpv)/prev_1month_mpv)*100 AS mpb1,
((cur_mpb-prev_3month_mpv)/prev_3month_mpv)*100 AS mpb3,
((cur_mpb-prev_6month_mpv)/prev_6month_mpv)*100 AS mpb6,
((cur_mpb-prev_1year_mpv)/prev_1year_mpv)*100 AS mpb1y,
((cur_mpb-prev_2year_mpv)/prev_2year_mpv)*100 AS mpb2y ,
((cur_mpb-prev_3year_mpv)/prev_3year_mpv)*100 AS mpb3y 
 FROM (
SELECT company_id,
(SELECT `code` FROM company WHERE id=n.company_id) AS `code`
,`nav_mpb`,`nav_cpb`,

(SELECT ltp FROM eod_stock WHERE company_id=n.company_id ORDER BY entry_date DESC LIMIT 1,1) AS ytp ,

(SELECT `nav_mpb` FROM `nav_sample_data` WHERE 
company_id=n.`company_id` AND publish_date=(SELECT MAX(publish_date) FROM `nav_sample_data`)) AS cur_mpb ,

(SELECT MAX(publish_date) FROM `nav_sample_data`) AS max_date ,

(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 7 DAY))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_7day_mpv ,

(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 1 MONTH))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_1month_mpv ,


(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 3 MONTH))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_3month_mpv ,


(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 6 MONTH))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_6month_mpv ,

(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 1 YEAR))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_1year_mpv ,


(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 2 YEAR))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_2year_mpv  ,


(SELECT nav_mpb FROM `nav_sample_data`
 WHERE company_id=n.company_id AND
  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 3 YEAR))
AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_3year_mpv 


 FROM nav_sample_data AS n  LIMIT 41) AS nav_data
 
 
